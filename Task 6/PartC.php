<?php
    class Binary_Tree_Node
    {
        public $data;
        public $left;
        public $right;

        public function _construct($d = NULL)
        {
            $this->data = $d;
        }

        public function traversePreorder()
        {
            $l = array();
            $r = array();

            if ($this->left)
            {
                $l = $this->left->traversePreorder();
            }
            if ($this->right)
            {
                $r = $this->right->traversePreorder();
            }

            return array_merge(array($this->data), $l, $r);
        }

        public function traversePostorder()
        {
            $l = array();
            $r = array();

            if ($this->left)
            {
                $l = $this->left->traversePostorder();
            }
            if ($this->right)
            {
                $r = $this->right->traversePostorder();
            }

            return array_merge($l, $r, array($this->data));
        }

        public function traverseInorder()
        {
            $l = array();
            $r = array();

            if ($this->left)
            {
                $l = $this->left->traverseInorder();
            }
            if ($this->right)
            {
                $r = $this->right->traverseInorder();
            }

            return array_merge($r, array($this->data), $l);
        }
    }
    class Sorting_Tree
    {
        public $tree;

        public function insert($val)
        {
            if (!(isset($this->tree)))
            {
                $this->tree = new Binary_Tree_Node($val);
            }
            else
            {
                $pointer = $this->tree;
                for (; ; )
                {
                    if ($val <= $pointer->data)
                    {
                        if ($pointer->left)
                        {
                            $pointer = $pointer->left;
                        }
                        else
                        {
                            $pointer->left = new Binary_Tree_node($val);
                            break;
                        }
                    }
                    else
                    {
                        if ($pointer->right)
                        {
                            $pointer = $pointer->right;
                        }
                        else
                        {
                            $pointer->right = new  Binary_Tree_Node($val);
                            break;
                        }
                    }
                }
            }
        }

        public function returnSorted()
        {
            return $this->tree->traverseInorder();
        }
    }

    $nums = array(69, 87, 65, 56, 37, 73, 50, 81, 23, 95, 53, 86, 57, 16, 35, 1, 55, 70, 26, 21);
    $sort_as_you_go = new Sorting_Tree();

    for ($i = 0; $i < 20; $i++)
    {
        $sort_as_you_go->insert($nums[$i]);
    }

    echo "<p>", implode(', ', $sort_as_you_go->returnSorted()), "</p>"; 
?>