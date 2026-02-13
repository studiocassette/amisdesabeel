<?php
/**
 * The template for displaying comments
 *
 * @package Amis_Sabeel_France
 * @since 1.0.0
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area mt-8">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $amis_sabeel_comment_count = get_comments_number();
            if ('1' === $amis_sabeel_comment_count) {
                printf(
                    esc_html__('Un commentaire sur &laquo;&nbsp;%1$s&nbsp;&raquo;', 'amis-sabeel'),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            } else {
                printf(
                    esc_html(_nx('%1$s commentaire sur &laquo;&nbsp;%2$s&nbsp;&raquo;', '%1$s commentaires sur &laquo;&nbsp;%2$s&nbsp;&raquo;', $amis_sabeel_comment_count, 'comments title', 'amis-sabeel')),
                    number_format_i18n($amis_sabeel_comment_count),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            }
            ?>
        </h2>

        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size' => 48,
                )
            );
            ?>
        </ol>

        <?php
        the_comments_navigation();

        if (!comments_open()) :
            ?>
            <p class="no-comments"><?php esc_html_e('Les commentaires sont fermes.', 'amis-sabeel'); ?></p>
            <?php
        endif;

    endif;

    comment_form(
        array(
            'title_reply'          => __('Laisser un commentaire', 'amis-sabeel'),
            'title_reply_to'       => __('Repondre a %s', 'amis-sabeel'),
            'cancel_reply_link'    => __('Annuler la reponse', 'amis-sabeel'),
            'label_submit'         => __('Publier le commentaire', 'amis-sabeel'),
            'submit_button'        => '<button type="submit" name="%1$s" id="%2$s" class="btn btn-primary %3$s">%4$s</button>',
            'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x('Commentaire', 'noun', 'amis-sabeel') . '</label><textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required></textarea></p>',
        )
    );
    ?>

</div>
