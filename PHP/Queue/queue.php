<?php 
	class Node
	{
		public $next;
	 	public $value;
	 	public function __construct($val)
	 	{	
	  		$this->value = $val;
	  		$this->next = null;
	 	}
	}
	class Queue
	{
		private $front; // the front of our Queue
	 	private $rear; // the rear of our Queue
	 	public $maxSize; // how many elements can be in our queue
	 	public function __construct($val)
	 	{
	  		$this->front = null;
	  		$this->rear = null;
	  		$this->maxSize = $val;
	 	}
	 	public function enqueue($val) // it will add an element to the end of the Queue
	 	{
	 		//if the queue is empty add to the front
	 		if($this->isEmpty()) {
	 			$this->front = new Node($val);
	 			$this->print();
	 		}else {	//iterate to the end of the queue
	 			//can't add if the queue is full
	 			if(!$this->isFull()) {
			 		$current = $this->front;
			 		while($current->next) {
			 			$current = $current->next;
			 		}
			 		//now we are at the end of the queue
			 		//add a new node
			 		$current->next = new Node($val);
			 		//print the Queue
		 			$this->print();
		 		} else {
		 			//queue is full and we cant add
		 			echo "Queue is full, you cannot add";
		 		}
		 	}
	 	}
	 	public function dequeue() // it will remove an element from the front of the Queue
	 	{
	 		if(!$this->isEmpty()) {
	 			$this->front = $this->front->next;
	 			$this->print();
	 		}
	 	}
	 	public function front() // returns the element in the front of your Queue
	 	{
	 		if(!$this->isEmpty()) {
		 		return $this->front->value;
	 		}
	 	}
	 	public function rear() // returns the element in the rear of your Queue
	 	{
	 		if(!$this->isEmpty()) {
	 			$current = $this->front;
	 			while($current->next) {
	 				$current = $current->next;
	 			}
	 			return $current->value;
	 		}
	 	}
	 	public function isEmpty() // returns true if the Queue is empty
	 	{
	 		return is_null($this->front);
	 	}
	 	public function isFull() // returns true if the Queue is full
	 	{
	 		$count = 0;
	 		if(!$this->isEmpty()) {
	 			//if the queue is not empty then it must have one value (the front)
	 			$count++;
	 			$current = $this->front;
	 			while($current->next) {
	 				$count++;
	 				$current = $current->next;
	 			}
	 			return $count == $this->maxSize;
	 		}
	 	}
	 	public function print()
	 	{
	 		echo "Queue: ";
	 		$current = $this->front;
	 			while($current) {
	 				echo $current->value.", ";
	 				$current = $current->next;
 			}
 			echo "<br>";
	 	}
	}

	$q = new Queue(5); // instantiates the Queue class with a maxSize attribute of 5
	echo $q->isEmpty()."<br>"; // returns true
	$q->enqueue(100); // Queue: 100
	echo $q->rear()."<br>"; // returns 100
	echo $q->front()."<br>"; // returns 100
	$q->enqueue(20); // Queue: 100, 20
	$q->enqueue(2); // Queue: 100, 20, 2
	$q->dequeue(); // Queue: 20, 2
	$q->enqueue(500); // Queue: 20, 2, 500
	$q->enqueue(12); // Queue: 20, 2, 500, 12
	$q->enqueue(30); // Queue: 20, 2, 500, 12, 30
	echo $q->isFull()."<br>"; // returns true

	echo "<h3> Trying to enqueue over limit</h3>";
	//try to push on more than limit
	$q->enqueue(69);
 ?>