<?php
if (have_rows('content')):
    while (have_rows('content')):
        the_row();
        switch (get_row_layout()):
            case 'services':
                ?>
                <div class="list-services">
                    <h2 class="m-title"><?php the_sub_field('block_title'); ?></h2>
                    <div class="list-services__inner">
                        <div class="list-services-media">
                            <?php $i = 0;
                            while (have_rows('services')): the_row();
                                $i++; ?>
                                <div data-item="<?php echo $i; ?>"
                                     style="background-image:url('<?php the_sub_field('bg') ?>')"
                                     class="list-services-media__item<?php echo ($i == 1) ? ' __active' : ''; ?>">
                                    <?php if (get_sub_field('video')) : ?>
                                        <video autoplay="true" loop="true">
                                            <source src="<?php the_sub_field('video') ?>" type="video/mp4">
                                        </video>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <ul class="list-services-list">
                            <?php $i = 0;
                            while (have_rows('services')): the_row();
                                $i++; ?>
                                <li class="list-services-list__list-item">
                                    <div data-item="<?php echo $i; ?>"
                                         class="list-services-list__item<?php echo ($i == 1) ? ' __active' : ''; ?>">
                                        <h3 class="list-services-list__title"><?php the_sub_field('title') ?></h3>
                                        <div class="list-services-list__content">
                                            <div
                                                class="list-services-list__content-inner"><?php the_sub_field('description') ?></div>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
                <?php
                break;
            case 'how-it-works':
                ?>
                <div class="how-it-works">
                    <div class="how-it-works__inner">
                        <h2 class="m-title"><?php the_sub_field('block_title'); ?></h2>
                        <div class="how-it-works-slides">
                            <?php while (have_rows('how-it-works')): the_row(); ?>
                                <div class="how-it-works-slides__slide">
                                    <div style="background-image:url(<?php the_sub_field('image'); ?>)"
                                         class="how-it-works__bg-item __active">
                                        <?php if (get_sub_field('video')) : ?>
                                            <video autoplay="true" loop="true">
                                                <source src="<?php the_sub_field('video') ?>" type="video/mp4">
                                            </video>
                                        <?php endif; ?>
                                    </div>
                                    <div class="how-it-works-slides__slide-inner">
                                        <div class="how-it-works-slides__content">
                                            <p><?php echo io_spanify_title(get_sub_field('title')); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <?php
                break;
            case 'faq':
                ?>
                <div class="faq">
                    <div class="faq__inner">
                        <div id="faq-collapse" aria-multiselectable="true" class="collapse-group">
                            <h2 class="m-title"><?php the_sub_field('block_title'); ?></h2>
                            <?php $i = 0;
                            while (have_rows('faq')): the_row();
                                $i++; ?>
                                <div class="collapse-item panel">
                                    <div data-toggle="collapse" data-parent="#faq-collapse"
                                         href="#faq-item-<?php echo $i; ?>" aria-expanded="false"
                                         class="collapse-item-heading collapsed">
                                        <div class="collapse-item-heading__outer">
                                            <div
                                                class="collapse-item-heading__inner"><?php the_sub_field('title') ?></div>
                                        </div>
                                        <span class="collapse-item__arrow"></span>
                                    </div>
                                    <div id="faq-item-<?php echo $i; ?>" class="collapse-item__content collapse">
                                        <div class="collapse-item__body">
                                            <?php the_sub_field('description') ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <?php if (get_sub_field('button_enabled')) : ?>
                            <div class="btn-gotopartner">
                                <a href="<?php the_sub_field('button_href') ?>"
                                   class="btn-gotopartner__item"><?php the_sub_field('button_title') ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
                break;
            case 'authors':
                ?>
                <?php $rows = get_sub_field('authors_rows'); ?>
                <?php $authors = get_sub_field('authors'); ?>
                <?php $authors_per_row = ceil(count($authors)/$rows); ?>
                <?php $i = 0; ?>
                <div class="authors_block">
                    <h2 class="m-title"><?php the_sub_field('block_title'); ?></h2>
                    <ul class="authors_list">
                        <li class="authors_list__item">
                            <?php foreach($authors as $author) : ?>
                                <?php if($i > 0 and $i % $authors_per_row == 0): ?>
                                    </li>
                                    <li class="authors_list__item">
                                <?php endif; ?>
                                <div class="authors_list__item__wrapper">
                                    <div style="background-image:url(<?php echo ($author['image_gif']?$author['image_gif']:$author['image']); ?>)" class="authors_list__item__gif"></div>
                                    <div style="background-image:url(<?php echo $author['image']; ?>)" class="authors_list__item__image"></div>
                                    <a href="<?php echo $author['link']; ?>" target="_blank" class="authors_list__item__link">
                                        <div class="author_header">
                                            <h3 class="author_header__title"><?php echo $author['title']; ?></h3>
                                            <?php if ($author['statistics_enabled']) : ?>
                                                <div class="author_header__hr"></div>
                                                <div class="author_header__statistics">
                                                    <div class="author_header__statistics__views">
                                                        <div class="author_header__statistics__likes__icon">
                                                        </div>
                                                        <div class="author_header__statistics__views__text"><?php echo $author['views'] ?></div>
                                                    </div>
                                                    <div class="author_header__statistics__likes">
                                                        <div class="author_header__statistics__views__icon">
                                                        </div>
                                                        <div class="author_header__statistics__likes__text"><?php echo $author['likes'] ?></div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                </div>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </li>
                    </ul>
                </div>
                <?php
                break;
            case 'wysiwyg':
                ?>
                <div class="page-article">
                    <div class="editor-content">
                        <?php the_sub_field('wysiwyg'); ?>
                    </div>
                </div>
                <?php
                break;
        endswitch;
    endwhile;
endif;
?>
