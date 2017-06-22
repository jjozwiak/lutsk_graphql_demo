<?php

namespace Drupal\graphql_book_schema\Types;

use Drupal\graphql_book_schema\Fields\BookCategoriesField;
use Drupal\graphql_book_schema\Fields\BookTitleField;
use Drupal\graphql_book_schema\Fields\NodeIdField;
use Drupal\graphql_book_schema\Fields\BookIsbnField;
use Drupal\graphql_book_schema\Fields\BookAuthorField;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class BookType extends AbstractObjectType {

    /**
     * {@inheritdoc}
     */
    public function build($config) {
        $config->addField(new NodeIdField());
        $config->addField(new BookTitleField());
        $config->addField(new BookIsbnField());
        $config->addField(new BookAuthorField());
        $config->addField(new BookCategoriesField());
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'Book';
    }
}
