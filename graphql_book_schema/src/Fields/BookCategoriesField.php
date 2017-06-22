<?php

namespace Drupal\graphql_book_schema\Fields;

use Drupal\node\NodeInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\StringType;

class BookCategoriesField extends AbstractField implements ContainerAwareInterface {
    use ContainerAwareTrait;

    /**
     * {@inheritdoc}
     */
    public function getType() {
        return new ListType(new StringType());
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function resolve($value, array $args, ResolveInfo $info) {
        if ($value instanceof NodeInterface) {
            $categories = [];
            foreach ($value->field_categories as $category) {
                if ($category->entity) {
                    $categories[] = $category->entity->label();
                }
            }
            return $categories;
        }

        return NULL;
    }
}
