<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerWyIByFY\srcDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerWyIByFY/srcDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerWyIByFY.legacy');

    return;
}

if (!\class_exists(srcDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerWyIByFY\srcDevDebugProjectContainer::class, srcDevDebugProjectContainer::class, false);
}

return new \ContainerWyIByFY\srcDevDebugProjectContainer(array(
    'container.build_hash' => 'WyIByFY',
    'container.build_id' => 'cada3213',
    'container.build_time' => 1538341162,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerWyIByFY');
