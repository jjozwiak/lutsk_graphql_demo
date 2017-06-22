<?php

namespace Drupal\graphql_book_schema\Fields;

use Drupal\graphql_book_schema\Types\AuthorType;
use Drupal\node\NodeInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\StringType;

class BookAuthorField extends AbstractField implements ContainerAwareInterface {
    use ContainerAwareTrait;

    /**
     * {@inheritdoc}
     */
    public function getType() {
        return new AuthorType();
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'author';
    }

    /**
     * {@inheritdoc}
     */
    public function resolve($value, array $args, ResolveInfo $info) {
        if ($value instanceof NodeInterface) {
            foreach ($value->field_author as $author) {
                if ($author->entity) {
                    $author = $author->entity;
                }
            }
            return $author;
        }

        return NULL;
    }
}
