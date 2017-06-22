<?php

namespace Drupal\graphql_book_schema\Types;

use Drupal\graphql_book_schema\Fields\BookTitleField;
use Drupal\graphql_book_schema\Fields\NodeIdField;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class AuthorType extends AbstractObjectType {

    /**
     * {@inheritdoc}
     */
    public function build($config) {
        $config->addField(new NodeIdField());
        $config->addField(new BookTitleField());
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'Author';
    }
}
