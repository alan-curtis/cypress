<?php
$term_id = get_queried_object()->term_id;

$class = [
    'get_info_link' => 'bg_blue',
    'apply_link' => 'bg_yellow',
    'enroll_link' => 'bg_sky_blue',
];

?>
<?php
// Sidebar cta buttons
$sidebar_cta_buttons = (empty($term_id)) ? get_field('sidebar_cta_buttons') : [];
if (empty($sidebar_cta_buttons)) {
    $sidebar_cta_buttons = get_field('sidebar_cta_buttons', 'department_' . $term_id);
    if(!empty($sidebar_cta_buttons)){
        $sidebar_cta_buttons = $sidebar_cta_buttons['sidebar_cta_buttons'];
    }
}

$sidebar_video = get_field('video_embed');
if (!empty($sidebar_video)) :
    preg_match('/src="([^"]+)"/', $sidebar_video, $match);
    $video_embed_url = $match[1] ?? '';
    ?>
    <div class="sidebar-video-wrapper">
        <div class="sidebar-video">
            <iframe src="<?php print $video_embed_url; ?>"></iframe>
        </div>
    </div>
<?php
endif;

if (empty($sidebar_video)) {
    $sidebar_video = get_field('video_embed', 'department_' . $term_id);
    if(!empty($sidebar_video)){
        preg_match('/src="([^"]+)"/', $sidebar_video, $match);
        $video_embed_url = $match[1] ?? '';
        $sidebar_video = isset($sidebar_video['video_embed']) ? $sidebar_video['video_embed'] : '';
        ?>
        <div class="sidebar-video-wrapper">
            <div class="sidebar-video">
                <iframe src="<?php print $video_embed_url; ?>"></iframe>

            </div>
        </div>
        <?php
    }
}


if ($sidebar_cta_buttons) :
    $titles = [
        "get_info_link" => 'Get Info',
        "apply_link" => 'Apply',
        "enroll_link" => 'Enroll',
    ];

    foreach ($sidebar_cta_buttons as $key => $sidebar_cta_button) :
    if ( $sidebar_cta_button ):?>
        <div class="program-rating-box <?php print $class[$key]; ?> ">
            <a href="<?php print $sidebar_cta_button['url'] ?>" title="<?php print $sidebar_cta_button['title']; ?>"
               target="<?php print $sidebar_cta_button['target'] ?>" rel="noopener noreferrer">
                <div class="img-holder"><img
                            src="<?php print get_template_directory_uri(); ?>/assets/images/<?php print $key; ?>.png"
                            class="program_rating_box_img img-responsive custom-right-class"
                            style="max-width:38px !important;"></div>
                <div class="txt-holder">
                    <h3><?php echo $titles[$key]; ?></h3>
                    <span class="read-more"><?php print $sidebar_cta_button['title']; ?> <i class="fa fa-angle-right"
                                                                                            aria-hidden="true"></i></span>
                </div>
            </a>
        </div>
    <?php
  else:
    endif;
    endforeach;

endif;


if (has_sub_field('program_rating')) :
    $program_rating = get_field('program_rating');
    if (!empty($program_rating['program_rating'])):
        ?>
        <div class="program-rating-box bg_white ">
            <?php if (isset($program_rating['link']) && !empty($program_rating['link'])): ?>
            <a href="<?php print $program_rating['link']['url'] ?>"
               title="<?php print $program_rating['link']['title']; ?>"
               target="<?php print $program_rating['link']['target'] ?>" rel="noopener noreferrer">
                <?php else: ?>
                <a href="#">
                    <?php endif; ?>
                    <div class="img-holder"><img src="<?php print $program_rating['image']; ?>"
                                                 class="program_rating_box_img img-responsive custom-right-class"
                                                 style="max-width:70px !important;"></div>
                    <div class="txt-holder">
                        <h3><?php print $program_rating['program_rating']; ?></h3>
                        <?php if (isset($program_rating['link']['title'])): ?>
                            <span class="read-more"><?php print $program_rating['link']['title']; ?> <i
                                        class="fa fa-angle-right" aria-hidden="true"></i></span>
                        <?php endif; ?>
                    </div>
                </a>
        </div>
    <?php
    endif;
endif; ?>
<?php
$sidebar_wysiwyg = (empty($term_id)) ? get_field('sidebar_wysiwyg') : "";

if (empty($sidebar_wysiwyg)) {
    $sidebar_wysiwyg = get_field('sidebar_wysiwyg', 'department_' . $term_id);
    if(!empty($sidebar_wysiwyg)){
        ?>
        <?php
//        $sidebar_wysiwyg = $sidebar_wysiwyg['sidebar_wysiwyg'];
    }
}
if (!empty($sidebar_wysiwyg)) :
    ?>
    <div class="sidebar_wysiwyg">
        <?php print $sidebar_wysiwyg; ?>
    </div>
<?php endif; ?>

<?php
$department_contact = (empty($term_id)) ? get_field('department_info_box') : "";
if (empty($department_contact)) {
    $department_contact = get_field('department_info_box', 'department_' . $term_id);
    if(!empty($department_contact)){
        $department_contact = $department_contact['department_info_box'];
    }
}

if (isset($department_contact['contacts']) && !empty($department_contact['contacts'])): ?>
    <div class="contact-department">
        <h4><?php print $department_contact['title']; ?></h4>
        <?php foreach ($department_contact['contacts'] as $contact): ?>
            <div class="item">
                <p class="head-name">
                    <strong><?php print $contact['title'] ?></strong>
                </p>
                <p><?php print $contact['caption'] ?></strong></p>
                <p><strong>Email:</strong> <a
                            href="mailto:<?php print $contact['email'] ?>"><?php print $contact['email'] ?></a>
                </p>
                <p><strong>Phone:</strong> <a
                            href="tel:<?php print $contact['phone'] ?>"><?php print $contact['phone'] ?></a>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
