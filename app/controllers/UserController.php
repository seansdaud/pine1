<?php 

class UserController extends BaseController {

	public function getProfile($username){
		$user = User::where(array("username" => $username, "usertype" => "1"))->first();
		if(empty($user)){
			App::abort(404);
		}
		$token=Token::where("user_id",$user->id)->get();
		$data = array(
			'id' => 'user-profile',
			'title' => $user->username,
			'user' => $user,
			'token'=>$token
		);
		return View::make("frontend.user.profile", $data);
	}

	function addReview(){
		$data = array(
			'user_id' => Auth::user()->id,
			'review' => Input::get("review"),
			"arena_id" => Input::get("arena_id")
		);
		if(Review::Create($data)){
			return Redirect::route("arena-detail", Input::get("arena_id"))->with("success", "Review Successfully Added.");
		}
		return Redirect::route("arena-detail", Input::get("arena_id"))->with("danger", "Error Occurred.");
	}

	public function changeProfile(){
		$data=array(
			'id'=>'change-profile',
			'title'=>'change-profile'
			);
		return View::make("frontend.user.update_profile", $data);
	}

	public function profileUpdated(){
		if(Input::hasfile('image')){
				$file = Input::file('image');
				$ext = Input::file('image')->getClientOriginalExtension();
				$name = uniqid().".".$ext;
				$upload = Input::file('image')->move("assets/img/profile/user/", $name);
				$img = Image::make('assets/img/profile/user/'.$name);
				$img->resize(300, null, function ($constraint) {
				    $constraint->aspectRatio();
				})->save("assets/img/profile/user/thumb/".$name);

				if($upload){
					$user = User::where("id", "=", Auth::user()->id)->first();
					File::delete("assets/img/profile/user/".$user->image);
					File::delete("assets/img/profile/user/thumb/".$user->image);
					$user->image = $name;
					$user->name = Input::get("name");
					$user->email = Input::get("email");
					$user->contact = Input::get("contact");
					$user->address = Input::get("address");
					$user->users_daily = Input::get("users_daily");
					if($user->save()){
						return Redirect::route('user-profile',Auth::user()->username)
							->with('success','updated successfully');
					}
					else{
						return Redirect::route('user-profile',Auth::user()->username)
							->with('warning','Error!! Try again');
					}
				}

				else{
					return Redirect::route("user-profile", Auth::user()->username)->with("danger", "Error uploading your file. Please try again.");
				}
			}
		else{
			$user = User::where("id", "=", Auth::user()->id)->first();
			$user->name = Input::get("name");
			$user->email = Input::get("email");
			$user->contact = Input::get("contact");
			$user->address = Input::get("address");
			$user->users_daily = Input::get("users_daily");
			if($user->save()){
				return Redirect::route('user-profile',Auth::user()->username)
			->with('success','updated successfully');
			}
			else{
				return Redirect::route('user-profile',Auth::user()->username)
			->with('warning','Error!! Try again');
			}
		}
	}

	function changeCover(){
				$file = Input::file('cover');
				$ext = Input::file('cover')->getClientOriginalExtension();
				$name = uniqid().".".$ext;
				if(!is_dir("assets/img/profile/user/cover")){
						mkdir("assets/img/profile/user/cover",0777, true);
					}
				$upload = Input::file('cover')->move("assets/img/profile/user/cover", $name);
				if($upload){
					$user = User::where("id", "=", Auth::user()->id)->first();
					File::delete("assets/img/profile/user/cover/".$user->cover_pic);
					$user->cover_pic = $name;
					if($user->save()){
						return Redirect::route('user-profile',Auth::user()->username)
							->with('success','updated successfully');
					}
					else{
						return Redirect::route('user-profile',Auth::user()->username)
							->with('warning','Error!! Try again');
					}
				}

				else{
					return Redirect::route("user-profile", Auth::user()->username)->with("danger", "Error uploading your file. Please try again.");
				}
	}

	function updateEvent(){
		$event_id=Input::get('event_id');
		if(Input::hasfile('image')){
				$file = Input::file('image');
				$ext = Input::file('image')->getClientOriginalExtension();
				$name = uniqid().".".$ext;
				$upload = Input::file('image')->move("assets/img/", $name);

				if($upload){
					$event = Events::where("id", "=", $event_id)->first();
					File::delete("assets/img/".$event->image);
					$event->image = $name;
					$event->name = Input::get("name");
					$event->detail = Input::get("detail");
					if($event->save()){
						return Redirect::route('user-profile',Auth::user()->username)
							->with('success','updated successfully');
					}
					else{
						return Redirect::route('user-profile',Auth::user()->username)
							->with('warning','Error!! Try again');
					}
				}

				else{
					return Redirect::route("user-profile", Auth::user()->username)->with("danger", "Error uploading your file. Please try again.");
				}
			}
		else{
			$event = Events::where("id", "=", $event_id)->first();
			$event->name = Input::get("name");
			$event->detail = Input::get("detail");
			if($event->save()){
				return Redirect::route('user-profile',Auth::user()->username)
			->with('success','updated successfully');
			}
			else{
				return Redirect::route('user-profile',Auth::user()->username)
			->with('warning','Error!! Try again');
			}
		}
	}
	public function book(){

				$id = Auth::id();
				$count=User::where('id',$id)->first();
				if ($count->usertype!='1') {

		return Redirect::route("home")->with("danger", "Your are not Allowed To Book!");

					
				}
				if (Input::get("type")=="points") {
					$arena= Arena::where('user_id',Input::get("admin"))->first();
					$count=Token::where('user_id',$id)->where('arena_id',$arena->id)->get();
					
					if ($arena->booking_points==null) {
						return Redirect::route("home")->with("danger", "Arena ".$arena->name." do not support Game Points!");

					}
					if ($count->isEmpty()) {
						
							return Redirect::route("home")->with("danger", "Your do not have enough Game Points!");

					}
					elseif (($count[0]->booking_points-$arena->booking_points)< 0 ){
						return Redirect::route("home")->with("danger", "Your do not have enough Game Points!");

					}
					else{
						}

				}
		Session::put('owner', Input::get("admin"));
		Session::put('date', Input::get("date"));

		Session::put('schedule', Input::get("schedule"));
		Session::put('price', Input::get("amt"));
		$data=array(
			'id'=>'book',
			'title'=>'Book',
			'admin'=>Input::get("admin"),

			'name'=>Input::get("admin_name"),
			'schedule'=>Input::get("schedule"),

			'time'=>Input::get("time"),

			'date'=>Input::get("date"),
			'price'=>Input::get("amt"),
			'type'=>Input::get("type")

			);
			$bookedor=Booking::where('schedule_id',Session::get('schedule'))->where('booking_date',Session::get('date'))->where('arena_id',Session::get('owner'))->get();

			if (!$bookedor->isEmpty()) {
				
		return Redirect::route("home")->with("danger", "Error!Your Schedule has already been Booked!Try another Schedule");

			}

		return View::make("frontend.user.book", $data);
	}
	public function success(){

	$bookedor=Booking::where('schedule_id',Session::get('schedule'))->where('booking_date',Session::get('date'))->where('arena_id',Session::get('owner'))->get();

			if (!$bookedor->isEmpty()) {
				
		return Redirect::route("home")->with("danger", "Error!Your Schedule has already been Booked!Try another Schedule");

			}

		if(isset($_GET['refId'])){
			//Verify the transaction from ESewa
			$postdata = http_build_query(
			    array(
			    	'm'=>'ver',
			        'amt' => $_GET['amt'],
			        'pid' => $_GET['oid'],
			        'rid' => $_GET['refId'],
			        'scd' => 'futsal'
			    )
			);
			$opts = array('http' =>
			    array(
			        'method'  => 'POST',
			        'header'  => 'Content-type: application/x-www-form-urlencoded',
			        'content' => $postdata
			    )
			);

			$context  = stream_context_create($opts);
			
			$result = file_get_contents('https://esewa.com.np/epay/transrec', false, $context);
			$xml=simplexml_load_string($result);
			$response = get_object_vars($xml);
			$response=($response['response_code']);
			$response = trim(preg_replace('/\s+/', '', $response));
			
			if($response == 'Success'){

				print_r($postdata);
				print_r($response);
				die();
			}
			else{

						//booking
				$userid = Auth::id();
							$adminid = Session::get('owner');
				$datename=Schedule::where('id',Session::get('schedule'))->get();
			if($datename[0]->book_status==0){
				 $book = new Booking;
					 $book->schedule_id=Session::get('schedule');
					  $book->user_id=$userid;
					  $book->booking_date=Session::get('date');
					   $book->booked_price=Session::get('price');
					  $book->arena_id=$adminid;
					  $book->save(); 
						  $client = Schedule::findOrFail(Session::get('schedule'));

						$client->book_status=$book->id;
						$client->push();
						 $bookin = Booking::findOrFail($book->id);

						$bookin->status=$book->id;
						$bookin->push();
			}
			else{
				 $book = new Booking;
						 $book->schedule_id=Session::get('schedule');
					  $book->user_id=$userid;
					  $book->booking_date=Session::get('date');
					   $book->booked_price=Session::get('price');
					  $book->arena_id=$adminid;
					  					  $book->save(); 
					   $bookin = Booking::findOrFail($book->id);

						$bookin->status=$datename[0]->book_status;
						$bookin->push();


			}
				 $schedule = new Scheduleinfo;
					$schedule->start_time=$datename[0]->start_time;
					$schedule->end_time =$datename[0]->end_time;
					$schedule->price = $datename[0]->price;
					$schedule->day=$datename[0]->day;
					$schedule->booking_id=$book->id;
					$schedule->save();
					$booking_info=Booking::where("id","=",$book->id)->first(); 
					$arena=Arena::where("user_id",$booking_info->arena_id)->first();
					$user_id=$userid ;
					$user_info=User::where("id", "=", $user_id)->first();
					$token=Token::where(array("user_id"=>$user_id,"arena_id"=>$arena->id))->get();
					if($token->isEmpty()){
						// Token::create(
						// 		array(
						// 			'user_id' => $user_id,
						// 			'arena_id' => $arena->id,
						// 			'booking_points' => 1
						// 		)
						// 	);
						$tok= new Token;
						$tok->user_id=$user_id;
						$tok->arena_id=$arena->id;
						$tok->booking_points=1;
						$tok->save();
					}
					else{
						$data=array(
							'booking_points'=>$token[0]->booking_points + 1
							);
						Token::where('id', $token[0]->id)->update($data);
					}

					if (!empty($user_info->email)){
								Mail::send('emails.booked',array(
									'username'=>$user_info->name,
									'start'=>$datename[0]->start_time,
									'end'=>$datename[0]->end_time,
									'date'=>$booking_info->booking_date,
									'arena'=>$arena->name
							), function($message) use ($user_info){
							$message->to($user_info->email, $user_info->name)->subject('Futsal booking');
						});
					}
					//booking end

		return Redirect::route("home")->with("success", "Your Booking has been booked!!");

				}
	}
	
	else{

		return Redirect::route("home")->with("danger", "Error. Please try again.");

	}
		}

		public function failure(){
		return Redirect::route("home")->with("danger", "Error. Please try again.");
				
		}
		public function bookviapoints(){

			$bookedor=Booking::where('schedule_id',Session::get('schedule'))->where('booking_date',Session::get('date'))->where('arena_id',Session::get('owner'))->get();

			if (!$bookedor->isEmpty()) {
				
		return Redirect::route("home")->with("danger", "Error!Your Schedule has already been Booked!Try another Schedule");

			}
			DB::transaction(function() {

						//booking
				$userid = Auth::id();
							$adminid = Session::get('owner');
				$datename=Schedule::where('id',Session::get('schedule'))->get();
			if($datename[0]->book_status==0){
				 $book = new Booking;
					 $book->schedule_id=Session::get('schedule');
					  $book->user_id=$userid;
					  $book->booking_date=Session::get('date');
					   $book->booked_price=Session::get('price');
					  $book->arena_id=$adminid;
					  $book->save(); 
						  $client = Schedule::findOrFail(Session::get('schedule'));

						$client->book_status=$book->id;
						$client->push();
						 $bookin = Booking::findOrFail($book->id);

						$bookin->status=$book->id;
						$bookin->push();
			}
			else{
				 $book = new Booking;
						 $book->schedule_id=Session::get('schedule');
					  $book->user_id=$userid;
					  $book->booking_date=Session::get('date');
					   $book->booked_price=Session::get('price');
					  $book->arena_id=$adminid;
					  					  $book->save(); 
					   $bookin = Booking::findOrFail($book->id);

						$bookin->status=$datename[0]->book_status;
						$bookin->push();


			}
				 $schedule = new Scheduleinfo;
					$schedule->start_time=$datename[0]->start_time;
					$schedule->end_time =$datename[0]->end_time;
					$schedule->price = $datename[0]->price;
					$schedule->day=$datename[0]->day;
					$schedule->booking_id=$book->id;
					$schedule->save();
					$booking_info=Booking::where("id","=",$book->id)->first(); 
					$arena=Arena::where("user_id",$booking_info->arena_id)->first();
					$user_id=$userid ;
					$user_info=User::where("id", "=", $user_id)->first();
					$token=Token::where(array("user_id"=>$user_id,"arena_id"=>$arena->id))->get();
					
						$data=array(
							'booking_points'=>$token[0]->booking_points - $arena->booking_points
							);
						Token::where('id', $token[0]->id)->update($data);
					$data=array(
							'game_points'=>$token[0]->id
							);
						Booking::where('id', $book->id)->update($data);
					

									if (!empty($user_info->email)){
								Mail::send('emails.booked',array(
									'username'=>$user_info->name,
									'start'=>$datename[0]->start_time,
									'end'=>$datename[0]->end_time,
									'date'=>$booking_info->booking_date,
									'arena'=>$arena->name
							), function($message) use ($user_info){
							$message->to($user_info->email, $user_info->name)->subject('Futsal booking');
						});
					}
					//booking end
					});


		return Redirect::route("home")->with("success", "Your Booking has been booked!!");

		}





}