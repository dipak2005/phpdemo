 <?php

    class dbConnection
    {

        public $host = "localhost";
        public $password = "00";
        public $username = "root";
        public $dbname = "moviebooking";
        public $connection;

        function connect()
        {
            $c = mysqli_connect($this->host, $this->password, $this->username, $this->dbname,);


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
        function updateUser($user_id, $name, $email, $password)
        {
            $this->connect();

            $query = "UPDATE  `users` SET `name`='$name', `email`='$email', `password`='$password',  WHERE id=$user_id";

            $result = mysqli_query($this->connection, $query);
            echo $result;
        }


// update categories

        function updateCategories($category_id, $category_name)
        {
            $this->connect();

            $query = "UPDATE  `catogries` SET  `category_name`='$category_name',,  WHERE id=$category_id";

            $result = mysqli_query($this->connection, $query);
            echo $result;
        }

// update product
        function updateProduct($product_id, $price)
        {
            $this->connect();

            $query = "UPDATE  `products` SET  `price`='$price',,  WHERE id=$product_id";

            $result = mysqli_query($this->connection, $query);
            echo $result;
        }


        // update order
        function updateOrder($order_id, $order_date)
        {
            $this->connect();

            $query = "UPDATE  `orders` SET  `order_date`='$order_date',,  WHERE id=$order_id";

            $result = mysqli_query($this->connection, $query);
            echo $result;
        }

// update orderitem
        function updateOrderItem($order_item_id, $order_id,$product_id,$quantity)
        {
            $this->connect();

            $query = "UPDATE  `orderitems` SET  `order_id`='$order_id',`product_id`='$product_id',`quantity`='$quantity',  WHERE id=$order_item_id";

            $result = mysqli_query($this->connection, $query);
            echo $result;
        }



// update review

        function updateReview($comment, $product_id,$rating,$review_id,$user_id)
        {
            $this->connect();

            $query = "UPDATE  `reviews` SET `comment`='$comment', `product_id`='$product_id',`rating`='$rating'`user_id`='$user_id',  WHERE id=$review_id";

            $result = mysqli_query($this->connection, $query);
            echo $result;
        }












        // delete the user detail via user id

        function deleteUser($user_id)
        {
            $this->connect();

            $query = "select * from product where id=$user_id";

            $result = mysqli_query($this->connection, $query);

            return $result;
        }

    //delete category
        function deleteCatogry($category_id)
        {
            $this->connect();

            $query = "select * from product where id=$category_id";

            $result = mysqli_query($this->connection, $query);

            return $result;
        }

// delete product 
        function deleteProduct($product_id)
        {
            $this->connect();

            $query = "select * from product where id=$product_id";

            $result = mysqli_query($this->connection, $query);

            return $result;
        }


        //delete order
        function deleteOrder($order_id)
        {
            $this->connect();

            $query = "select * from product where id=$order_id";

            $result = mysqli_query($this->connection, $query);

            return $result;
        }

// delete orderitem
        function deleteOrderItem($order_item_id)
        {
            $this->connect();

            $query = "select * from product where id=$order_item_id";

            $result = mysqli_query($this->connection, $query);

            return $result;
        }
//delete review 
        function deleteReview($review_id)
        {
            $this->connect();

            $query = "select * from product where id=$review_id";

            $result = mysqli_query($this->connection, $query);

            return $result;
        }










        // get the product details for updating the details of product

        function  getProductRecord($id)
        {

            $this->connectWithDatabase();

            $query = "select * from student where id=$id";

            $result = mysqli_query($this->connection, $query);

            return $result;
        }


        // get the product details show the user interface 

        function getData()
        {
            $this->connectWithDatabase();

            $query = "SELECT * from  product ";

            $result = mysqli_query($this->connection, $query);

            return $result;
        }
    }

    ?>