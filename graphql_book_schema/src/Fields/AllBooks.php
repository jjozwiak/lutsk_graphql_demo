<?php

namespace Drupal\graphql_book_schema\Fields;

use Drupal\Core\Entity\EntityTypeManager;
use Drupal\graphql_book_schema\Types\BookType;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\ListType\ListType;

class AllBooks extends AbstractField implements ContainerAwareInterface {
    use ContainerAwareTrait;

    /**
     * {@inheritdoc}
     */
    public function build(FieldConfig $config) {
        parent::build($config);
    }

    /**
     * {@inheritdoc}
     */
    public function getType() {
        return new ListType(new BookType());
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'allBooks';
    }

    /**
     * {@inheritdoc}
     */
    public function resolve($value, array $args, ResolveInfo $info) {
        /** @var EntityTypeManager $entityTypeManager */
        $entityTypeManager = $this->container->get('entity_type.manager');

        $entities = $entityTypeManager
            ->getStorage('node')
            ->loadByProperties(array('type' => 'books'));

        return $entities;

    }
}
