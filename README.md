## https://www.youtube.com/watch?v=zckH4xalOns&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q ##
-> Tutorial om de syntax van laravel onder de knie te krijgen

## https://www.youtube.com/watch?v=-9tUWhNmQz4 ##
-> Ik heb deze tutorial moeten volgen om een multi authenticatie systeem toe tevoegen in mijn project

//  public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){

            if(Auth::user()->role == '1'){

                return $next($request);

            }else{

                return redirect('/homepage')->with('msg', ' You are not a admin >:( ');

            }

        }else {

            return redirect('/login')->with('msg', ' Login in to go to admin page ');
            
        }
        
    }
    //

## https://www.youtube.com/watch?v=EaiFeRezSes ##
Ik heb deze tutorial moeten volgen om items in een shopping cart te kunnen steken

public function addCart(Request $request, $id)
   {
        $product = Product::find($id);

        $user = Auth::user();

        $cart = new Cart();

        //GEBRUIKER

        $cart->name = $user->name;

        $cart->email = $user->email;

        $cart->user_id = $user->id;

        //PRODUCT

        $cart->quantity = $request->quantity;

        $cart->product_name = $product->name;

        $cart->price = $product->price * $request->quantity;

        $cart->product_id = $product->id;


        $cart->save();

       
        return redirect()->back();
   }


## https://www.youtube.com/watch?v=EL5Yv0hDbOs ##
Ik heb deze tutorial moeten volgen om items naar de order table te kunnen plaatsen

 public function order(){
     
     $user = Auth::user();

     $userId = $user->id;

     $student = StudentCard::find($userId);

     $data = Cart::where('user_id', '=', $userId)->get();

     

          foreach ($data as $data) {

               if($student->amount > $data->price)
               {
               $order = new Order;

               $order->user_id = $data->user_id;

               $order->user_name = $data->name;

               $order->user_email = $data->email;

               $order->product_name = $data->product_name;

               $order->quantity = $data->quantity;

               $order->price = $data->price;

               $order->product_id = $data->product_id;


               $order->save();

               $cart_id = $data->id;

               $cart = Cart::find($cart_id);

               $student->amount = $student->amount - $data->price;

               $student->update();

               $cart->delete();
               } 
                else {
                    return view('faplab.recharge', ['student' => $student])->with('fund', 'Low on fund please top up');   
                }
          }

      return redirect()->back()->with('order', 'Thank you for your order');  
     

    }