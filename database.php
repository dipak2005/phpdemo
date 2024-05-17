 <?php

    class dbConnection
    {

        public $host = "localhost";
        public $password = "";
        public $username = "root";
        public $dbname = "moviebooking";
        public $connection;

        function connect()
        {
            $c = mysqli_connect($this->host,$this->username, $this->password,  $this->dbname);


            if ($c) {
                $this->connection = $c;
            } else {
                echo "error";
            }
        }

        // insert users
        function insertUser($name, $email, $password)
        {
            $this->connect();

            $query = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";

            $result = mysqli_query($this->connection, $query);
            echo $result;
        }



        // insert category
        function insertCategory($category_id, $name)
        {
            $this->connect();

            $query = "INSERT INTO `catogries`(`category_id`, `name`) VALUES ('$category_id','$name')";

            $result = mysqli_query($this->connection, $query);
            echo $result;
        }

        //insert product

        function insertProduct($category_id, $price, $product_id, $product_name)
        {

            $this->connect();

            $query = "INSERT INTO `products`(`category_id`, `price`,`product_id`,`product_name`) VALUES ('$category_id','$price','$product_id','$product_name')";
            $result = mysqli_query($this->connection, $query);
            echo $result;
        }


        // insert order 

        function insertOrder($user_id, $order_date)
        {

            $this->connect();

            $query = "INSERT INTO `orders`(`user_id`, `order_date`) VALUES ('$user_id','$order_date')";
            $result = mysqli_query($this->connection, $query);
            echo $result;
        }



        // insert orderitem


 function insertOrderItem($order_id, $product_id,$quantity)
        {

            $this->connect();

            $query = "INSERT INTO `orders`(`order_id`, `product_id`,`quantity`) VALUES ('$order_id','$product_id','$quantity')";
            $result = mysqli_query($this->connection, $query);
            echo $result;
        }

    
   
// insert review
        function insertReview($comment, $product_id,$rating,$review_id,$user_id)
        {

            $this->connect();

            $query = "INSERT INTO `reviews`(`comment`, `product_id`,`rating`,`review_id`,`user_id`) VALUES ('$comment','$product_id','$rating','$review_id','$user_id')";
            $result = mysqli_query($this->connection, $query);
            echo $result;
        }



// --------------------------------------------------------------------------------
// update user detail
        function updateUser($id, $name, $email, $password)
        {
            $this->connect();

            $query = "UPDATE `users` SET `user_id`='$id',`name`='$name',`email`='$email',`password`='$password' WHERE user_id=$id";

            $result = mysqli_query($this->connection, $query);
            echo $result;
        }


// update categories

        function updateCategories($category_id, $category_name)
        {
            $this->connect();

            $query = "UPDATE  `catogries` SET  `category_name`='$category_name',  WHERE user_id=$category_id";

            $result = mysqli_query($this->connection, $query);
            echo $result;
        }

// update product
        function updateProduct($product_id, $price)
        {
            $this->connect();

            $query = "UPDATE  `products` SET  `price`='$price',,  WHERE user_id=$product_id";

            $result = mysqli_query($this->connection, $query);
            echo $result;
        }


        // update order
        function updateOrder($order_id, $order_date)
        {
            $this->connect();

            $query = "UPDATE  `orders` SET  `order_date`='$order_date',,  WHERE user_id=$order_id";

            $result = mysqli_query($this->connection, $query);
            echo $result;
        }

// update orderitem
        function updateOrderItem($order_item_id, $order_id,$product_id,$quantity)
        {
            $this->connect();

            $query = "UPDATE  `orderitems` SET  `order_id`='$order_id',`product_id`='$product_id',`quantity`='$quantity',  WHERE user_id=$order_item_id";

            $result = mysqli_query($this->connection, $query);
            echo $result;
        }



// update review

        function updateReview($comment, $product_id,$rating,$review_id,$user_id)
        {
            $this->connect();

            $query = "UPDATE  `reviews` SET user_id=$review_id,`comment`='$comment', `product_id`='$product_id',`rating`='$rating'`user_id`='$user_id',  WHERE $review_id";
// UPDATE `users` SET `user_id`='[value-1]',`name`='[value-2]',`email`='[value-3]',`password`='[value-4]' WHERE 1
            $result = mysqli_query($this->connection, $query);
            echo $result;
        }












        // delete the user detail via user id

        function deleteUser($id)
        {
            $this->connect();

            $query = "DELETE  from `users` WHERE user_id=$id ";

            $result = mysqli_query($this->connection, $query);
           
            return $result;
        }

    //delete category
        function deleteCatogry($id)
        {
            $this->connect();

            $query = "DELETE  from `product` WHERE category_id=$id";

            $result = mysqli_query($this->connection, $query);

            return $result;
        }

// delete product 
        function deleteProduct($id)
        {
            $this->connect();

            $query = "DELETE  from `product` WHERE product_id=$id";

            $result = mysqli_query($this->connection, $query);

            return $result;
        }


        //delete order
        function deleteOrder($id)
        {
            $this->connect();

            $query = "DELETE  from `product` WHERE order_id=$id";

            $result = mysqli_query($this->connection, $query);

            return $result;
        }

// delete orderitem
        function deleteOrderItem($id)
        {
            $this->connect();

            $query = "DELETE from `product` WHERE order_item_id=$id";

            $result = mysqli_query($this->connection, $query);

            return $result;
        }
//delete review 
        function deleteReview($review_id)
        {
            $this->connect();

            $query = "DELETE  from `product` WHERE review_id=$review_id";

            $result = mysqli_query($this->connection, $query);

            return $result;
        }










        // get the product details for updating the details of product

        function  getUser($user_id)
        {

            $this->connect();

            $query = "select * from users where user_id=$user_id";

            $result = mysqli_query($this->connection, $query);

            return $result;
        }


        function getUserByinsert($id){
            $this->connect();
            $q="select * from `users` where user_id=$id";
           
            $res=mysqli_query($this->connection,$q);
            return $res;
        }


        // get the product details show the user interface 

        function getData()
        {
            $this->connect();

            $query = "SELECT * from  users ";

            $result = mysqli_query($this->connection, $query);

            return $result;
        }
    }

    ?>