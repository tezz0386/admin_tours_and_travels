<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\PostMail;
use App\Models\Admin\Banner\Banner;
use App\Models\Admin\Blog\Blog;
use App\Models\Admin\Category\Category;
use App\Models\Admin\Charge\Charge;
use App\Models\Admin\Destination\Destination;
use App\Models\Admin\FAQ\Faq;
use App\Models\Admin\Member\Member;
use App\Models\Admin\Package\Package;
use App\Models\Admin\Package\PackageCategory;
use App\Models\Admin\Page\Page;
use App\Models\Admin\Ratting\Ratting;
use App\Models\Admin\Testimonial\Testimonial;
use App\Models\Booking;
use App\Models\Email;
use App\Models\User;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;

class FrontendController extends Controller
{
    //
    function __construct(Request $request)
    {
        session()->put('ip', $request->ip());
        $visit= '';
        if(session()->exists('ip')){
            $visit = DB::table('shetabit_visits')->where('ip', session('ip'))->first();
        }
        if(!$visit){
        $user = new User();
        $request->visitor()->visit($user);
        }
    }
    public function getBanners()
    {
        return Banner::orderByDesc('created_at')->get();
    }
    public function getDestinations($n='')
    {
        $destinations = '';
        if($n==''){
            $destinations= Destination::orderByDesc('created_at')->get();
        }else{
            $destinations= Destination::orderByDesc('created_at')->limit($n)->get();
        }
        return $destinations;
    }
    public function getPage($page)
    {
        return Page::where('title', $page)->first();
    }
    public function getOffPackages()
    {
        return Package::orderByDesc('created_at')->where('is_off', true)->get();
    }
    public function getMembers()
    {
        return Member::orderByDesc('created_at')->get();
    }
    public function getPackageWithCategory()
    {
        return PackageCategory::orderByDesc('created_at')->get();
    }
    public function getTestimonials()
    {
        return Testimonial::orderByDesc('created_at')->where('status', true)->get();
    }
    public function getFAQs()
    {
        return Faq::orderByDesc('created_at')->where('status', true)->get();
    }
    public function getSlug($toSlug)
    {
        return SlugService::createSlug(Email::class, 'slug', $toSlug);
    }
    public function index()
    {
    	return view('welcome', [
            'banners'=>$this->getBanners(),
            'about'=>$this->getPage('About Us'),
            'destinations'=>$this->getDestinations(6),
            'packages'=>$this->getOffPackages(),
            'members'=>$this->getMembers(),
            'packageWithCategory'=>$this->getPackageWithCategory(),
            'page'=>'home',
            'testimonials'=>$this->getTestimonials(),
            'allDestinations'=>$this->getDestinations(),
        ]);
    }
    public function getDestination($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('frontend.destination',[
            'destinations'=>$category->destinations,
            'category'=>$category,
            'page'=>'destination',
        ]);
    }
    public function getSinglePackage(Request $request, $slug)
    {
        $destination ='';
        $arrival = '';
        $departure='';
        $package = Package::where('slug', $slug)->first();
        if($request->has('destination')){
            $destination=Destination::findOrFail($request->destination);
        }
        if($request->has('arrival')){
            $arrival = $request->arrival;
            $departure = date('Y-m-d', strtotime($arrival. ' + '.$package->duration_days.' days'));
        }
        if($request->has('destination')){
            return view('frontend.destination-trip', [
                'package'=>$package,
                'page'=>'booking',
                'packageCategories'=>$this->getPackageWithCategory(),
                'destination'=>$destination,
                'arrival'=>$arrival,
                'departure'=>$departure,
            ]);
        }else{
            return view('frontend.single-trip', [
                'package'=>$package,
                'page'=>'booking',
                'packageCategories'=>$this->getPackageWithCategory(),
            ]);
        }
    }
    public function getSingleMember($slug)
    {
        $member = Member::where('slug', $slug)->first();
        return view('frontend.single-member', [
            'member'=>$member,
        ]);
    }
    public function getPackages()
    {
        return view('frontend.booking', [
            'packageWithCategory'=>$this->getPackageWithCategory(),
            'page'=>'booking',
            'pageInfo'=>$this->getPage('Booking'),
        ]);
    }
    public function getBlogs($n)
    {
        return Blog::orderByDesc('created_at')->paginate($n);
    }
    public function getBlog()
    {
        return view('frontend.blog', [
            'pageInfo'=>$this->getPage('Blog'),
            'page'=>'blog',
            'packageCategories'=>$this->getPackageWithCategory(),
            'blogs'=>$this->getBlogs(5),
        ]);
    }
    public function getAbout()
    {
        return view('frontend.about', [
            'about'=>$this->getPage('About Us'),
            'page'=>'about',
        ]);
    }
    public function getContact()
    {
        return view('frontend.contact', [
            'page'=>'contact',
            'pageInfo'=>$this->getPage('About Us'),
        ]);
    }
    public function getFAQ()
    {
        return view('frontend.faq', [
            'page'=>'faq',
            'faqs'=>$this->getFaqs(),
            'pageInfo'=>$this->getPage('FAQ'),
        ]);
    }
    public function getDate(Request $request)
    {
        if ($request->ajax()) {
            $package = Package::find($request->package);
            $arrival = $request->arrival;
            $departure = date('Y-m-d', strtotime($arrival. ' + '.$package->duration_days.' days'));
            $data = array(
                'arrival'=>$arrival,
                'departure'=>$departure,
            );
            echo json_encode($data);
        }
    }
    public function getBookingCalculation(Request $request)
    {
        $arrival = '';
        $departure='';
        $diff ='';
        if ($request->ajax()) {
            $package = Package::find($request->package);
            $arrival = Carbon::parse($request->arrival);
            $departure = Carbon::parse($request->departure);
            $diff = $arrival->diffInDays($departure);
            $days = $diff+1;
            $nights = $diff;
            $adults = $request->adults;
            $childs = $request->childs;
            $adultCharge = Charge::where('title', 'Adult')->first();
            $childCharge = Charge::where('title', 'Child')->first();
            $charge = (($adultCharge->per_day * $days)*$adults) + (($adultCharge->per_night * $nights)*$adults) + (($childCharge->per_day * $days)*$childs) + (($childCharge->per_night * $nights)*$childs)+($package->start_from);
            $data = '';
            $bookingData =[
                'adults'=>$adults,

            ];
            $data = array(
                'charge'    => $charge,
                'adults'=>$adults,
                'childs'=>$childs,
                'arrival'=>$request->arrival,
                'departure'=>$request->departure,
            );
            echo json_encode($data);

        }
    }
    public function getPostBooking(Request $request)
    {
        $details = [
            'arrival'=>$request->arrival,
            'departure'=>$request->departure,
            'charge'=>$request->charge,
            'adults'=>$request->adults,
            'childs'=>$request->childs,
            'package'=>$request->package,
            'destination_id'=>$request->destination_id,
        ];
        $request->session()->put('details', $details);
        return view('frontend.booking-form');
    }
    public function postBooking(BookingRequest $request)
    {
        $booking = new Booking();
        if(Session::has('details')){
            $details = Session::get('details');
            $booking->fill($request->all());
            $booking->arrival=$details['arrival'];
            $booking->departure=$details['departure'];
            $booking->charge=$details['charge'];
            $booking->adults=$details['adults'];
            $booking->package_id=$details['package'];
            if(!$details['destination_id']==''){
                $booking->destination_id=$details['destination_id'];
            }
            $booking->save();
            Session::forget('details');
            return redirect()->route('index')->with('success', 'Successfully your booking has submited, we will contact you as soon as possible, Thank You !!!');
        }else{
            return redirect()->route('index')->with('error', 'Could not be Booked please try again');
        }
        return view('frontend.booking-form');
    }
    public function postMail(PostMail $request)
    {
        $data=array(
            'name'=>$request->name,
            'email'=>SITE_EMAIL,
            'subject'=>$request->subject,
            'from'=>$request->email,
            'content'=>$request->message,
        );
        $email = new Email();
        $email->fill($request->all());
        $email->slug=$this->getSlug($request->name);
        if($email->save()){
             Mail::send('emails.mail',$data, function ($message) use ($data){
                 $message->from($data['from']);
                 $message->subject($data['subject']);
                 $message->to($data['email']);
             });
            return redirect()->route('index')->with('success', '|Successfully We have received your message');
        }else{
            return back()->with('error', 'Oppps!!!, Couold not be sent your message please try again later');
        }
    }
    public function postRatting(Request $request, $slug)
    {
        $member = Member::where('slug', $request->slug)->first();
        $ratting = Ratting::where('ip_address', $request->ip())->where('member_id', $member->id)->first();
        if($ratting){
            $ratting->member_id = $member->id;
            $ratting->rate=$request->rate;
            $ratting->save();
            return redirect()->route('index')->with('success', 'Successfully your rated has posted, Thank you !!!');
        }
        $ratting = new Ratting();
        $ratting->member_id = $member->id;
        $ratting->rate=$request->rate;
        $ratting->ip_address=$request->ip();
        $ratting->save();
        return redirect()->route('index')->with('success', 'Successfully your rated has posted, Thank you !!!');
    }

}
