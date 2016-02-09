<?php 
  class Node {
    public $value, $left, $right;
    public function __construct($value)
    {
      $this->value = $value;
    }
    public function add($val) {
      //if the value should go to the right
      if ($val > $this->value) {
        //if we're at the bottom on the tree make a new node
        if($this->right == null) {
          $this->right = new Node($val);
          return true;
        } else {
          //else try adding to the next node
          return $this->right->add($val);
        }
      //if the value should go to the left
      } elseif($val < $this->value) {
        //if we're at the bottom of the tree make a new node
        if($this->left == null) {
          $this->left = new Node($val);
          return true;
        //else try adding to the next node
        } else {
          return $this->left->add($val);
        }
      } else {
        //this is a duplicate, not sure of the use case here
        return false;
      }
    }

    public function remove($val, $parent) {
      //if the value is to the left of this node
      if($val < $this->value) {
        //if there are values to the left of this nide
        if($this->left != null) {
          //traverse to the left
          return $this->left->remove($val, $this);
        } else {
          //this value does not exist in the tree, return false
          return false;
        }
      //if the value is the the right of this node
      } elseif ($val > $this->value) {
        //if there are values to the right of this node
        if($this->right != null) {
          //traverse right
          return $this->right->remove($val, $this);
        } else {
          //this value does not exist in the tree
          return false;
        }
      //this is the node to delete
      } else {
        //if there are nodes to both the left and right of this node
        if($this->left != null && $this->right != null) {
          //find the minimum value on the right
          //and set that value to be the value of this node;
          //then go through the tree until we get to the duplicate node to the right and remove it
          $this->value = $this->right->minValue();
          $this->right->remove($this->value, $this);
        //if this is the node to the left of its parent 
        } elseif ($parent->left == $this) {
          //set the parents left node to be equal to the node left of this node if it is not null, otherwise set it to the node to the right
          $parent->left == ($this->left != null) ? $this->left : $this->right;
        //if this is the node to the right of its parent
        } elseif ($parent->right == $this) {
          //set the parents right not to be equal to the node left of this node if it is not null, otherwise set it to the node to the right
          $parent->right == ($this->left != null) ? $this->left : $this->right;
        }
        //if we get here then we sucessfully deleted a node!  YAY!
        return true;
      }
    }

    public function find($val) {
      if($val == $this->value) {
        return $this;
      } elseif ($val > $this->value) {
          if($this->right) {
            return $this->right->find($val);
          } else {
            return false;
          }
      } else {
        if($this->left) {
            return $this->left->find($val);
          } else {
            return false;
          }
      }
    }

    public function print() {
      if($this->left) {
        $this->left->print();
      }
      echo $this->value.", ";
      if($this->right) {
        $this->right->print();
      }
    }

    //finds the left most value on sub nodes
    private function minValue() {
      if($this->left == null) {
        return $this->value;
      } else {
        return $this->left->minValue();
      }
    }
  }
  Class BST{
   public function __construct()
   {
    $this->root= null;
   }
   //returns true if the value was added correctly
   public function add($value)
   {
    //if the root is null then we must start the tree
     if($this->root == null) {
      $this->root = new Node($value);
      return true;
     } else {
      //the node knows how to add its own values
      return $this->root->add($value);
    }
   }

   //return true if correctly removed
  //return false if value was never found
   public function remove($value)
   {
    //if there is no root we cannot remove anything
    if($this->root == null) {
      return false;
    } else {
      //if the root is the value we need to return
      if($this->root->value == $value) {
        //make a new fake root
        $auxRoot = new Node(0);
        //set the root to the left
        $auxRoot->left = $root;
        //use the remove function
        $result = $this->root->remove($value, $auxRoot);
        //the new value to the left of the fake root is the new root
        $this->root = $auxRoot->left;
        return $result;
      } else {
        //the node knows how to remove correctly
        return $this->root->remove($value, null);
      }
    }
   }
   //echo all values in the tree in order
   public function print()
   {
    if(!$this->root) {
        return false;
      }
      echo $this->root->print();
   }
   public function find($value)
   {
    //return node if value is found
    //return false if not found

    if(!$this->root) {
      return false;
    }
    return $this->root->find($value);
   }
   public function isEmpty()
   {
    //return true if the linked list is empty
    //return false if linked list has nodes
    if($this->root !== null) {
      return false;
    }
    return true;
   }

   public function min()
   {
    if(!$this->isEmpty()) {
      $current = $this->root;

      while($current->left) {
        $current = $current->left;
      }
      return $current->value;
    } else {
      return false;
    }
   }

  public function max()
   {
    //return the Max value
    if(!$this->isEmpty()) {
      $current = $this->root;

      while($current->right) {
        $current = $current->right;
      }
      return $current->value;
    } else {
      return false;
    }
   }
  }
?>



















