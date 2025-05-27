<?php
/**
 * Custom Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content into.
 * @param   array $context The context provided to the block by the post or its parent block.
 */

// クラス名の作成
$className = 'custom-block';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

// ACFフィールドの値を取得
$title = get_field('title');
$content = get_field('content');
?>

<div class="<?php echo esc_attr($className); ?>">
    <?php if ($title) : ?>
        <h2 class="custom-block__title"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>
    
    <?php if ($content) : ?>
        <div class="custom-block__content">
            <?php echo wp_kses_post($content); ?>
        </div>
    <?php endif; ?>
</div> 