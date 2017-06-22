<?php

namespace Drupal\graphql_book_schema\Fields;

use Drupal\node\NodeInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\StringType;

class BookIsbnField extends AbstractField implements ContainerAwareInterface {
    use ContainerAwareTrait;

    /**
     * {@inheritdoc}
     */
    public function getType() {
        return new NonNullType(new StringType());
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'isbn';
    }

    /**
     * {@inheritdoc}
     */
    public function resolve($value, array $args, ResolveInfo $info) {
        if ($value instanceof NodeInterface) {
            return $value->field_isbn->value;
        }

        return NULL;
    }
}
