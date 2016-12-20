<?php
class Node{
  public $value;
  public $left;
  public $right;
  public $parent;

  public function __construct($value, Node $parent=null){
    $this->value = $value;
    $this->parent = $parent;
  }
}

class BST
{
  public $root;
  public function __construct($value=null){
    if($value!==null){
      $this->root = new Node($value);
    }
  }
  public function search($value){
    $node = $this->root;
    while($node){
      if($value > $node->value){
        $node = $node->right;
      } else if($value < $node->value){
        $node = $node->left;
      } else {
        break;
      }
    }
    return $node;
  }

  public function insert($value){
    $node = $this->root;
    if(!$node){
      return $this->root = new Node($value);
    }
    while($node){
      if($value > $node->value){
        echo "insert right: $value\n";
        if($node->right){
          $node = $node->right;
        } else {
          $node = $node->right = new Node($value, $node);
          break;
        }
      } else if($value < $node->value){
        echo "insert left: $value\n";
        if($node->left){
          $node = $node->left;
        } else {
          $node = $node->left = new Node($value, $node);
          break;
        }
      } else {
        break;
      }
    }
    return $node;
  }
  public function walk(Node $node = null){
    if(!$node){
      $node = $this->root;
    }
    if(!$node){
      return false;
    }
    if($node->left){
      yield from $this->walk($node->left);
    }
    yield $node;
    if($node->right){
      yield from $this->walk($node->right);
    }
  }
}
$rootVal = $argv[1];
$depth = $argv[2];
$bstree = new BST($rootVal);
$bstree->insert(110);
$bstree->insert(1100);
$bstree->insert(1101);

$bstree->insert(111);
$bstree->insert(1110);
$bstree->insert(1101);

// $tree = $bstree->walk();
// foreach($tree as $node){
//   if($node->right){
//     echo "right: ";
//   }
//   echo "{$node->value}\n";
// }
