<?php

namespace Drupal\graphql_book_schema;

use Drupal\graphql\SchemaProvider\SchemaProviderInterface;
use Drupal\graphql_book_schema\Fields\AllBooks;
use Drupal\graphql_book_schema\Fields\BookByIdField;
use Youshido\GraphQL\Schema\Schema;

class SchemaProvider implements SchemaProviderInterface {

    /**
     * {@inheritdoc}
     */
    public function getSchema() {
        $schema = new Schema();
        $schema->addQueryField(new BookByIdField());
        $schema->addQueryField(new AllBooks());

        return $schema;
    }
}
