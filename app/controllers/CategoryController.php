<?php
    class CategoryController {
        private $categoryModel;


        public function __construct()
        {
            $this->categoryModel = new Category;
        }

        public function getAllCategories() {
            $categories = $this->categoryModel->index();
            if(isset($categories)) {
                return $categories;
            }
        }
    }

?>