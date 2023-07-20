<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package freecanser
 */

get_header();
?>

<!-- Start FL Page Title Area -->
<div class="fl-page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2><?php the_title(); ?></h2>
        </div>
    </div>
    <div class="divider"></div>
</div>

<!-- Start FL Blog Details Area -->
<div class="fl-blog-details-area ptb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="fl-blog-details-desc">
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url());?>" alt="<?php echo the_title(); ?>">
                    <p><?php the_content(); ?></p>
                    
                    <blockquote class="wp-block-quote">
                        <p>It is a long established fact that a reader will be distracted by the readable when content of a page when looking at its layout.</p>
                        <cite>James Smith</cite>
                    </blockquote>
                    <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</p>
                    <ul class="wp-block-gallery columns-3">
                        <li class="blocks-gallery-item">
                            <figure>
                                <img src="assets/img/blog/blog4.jpg" alt="image">
                            </figure>
                        </li>
                        <li class="blocks-gallery-item">
                            <figure>
                                <img src="assets/img/blog/blog5.jpg" alt="image">
                            </figure>
                        </li>
                        <li class="blocks-gallery-item">
                            <figure>
                                <img src="assets/img/blog/blog6.jpg" alt="image">
                            </figure>
                        </li>
                    </ul>
                    <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</p>
                    <ul>
                        <li>Scientific skills for getting a better result</li>
                        <li>Communication skills to getting in touch</li>
                        <li>A career overview opportunity available</li>
                        <li>A good work environment for work</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                    <div class="article-tags">
                        <a href="blog.html">#Business</a>
                        <a href="blog.html">#Startup</a>
                        <a href="blog.html">#Agency</a>
                    </div>
                    <div class="comments-area">
                        <h3 class="comments-title">2 Comments:</h3>
                        <ol class="comment-list">
                            <li class="comment">
                                <article class="comment-body">
                                    <footer class="comment-meta">
                                        <div class="comment-author vcard">
                                            <img src="assets/img/user/user2.jpg" class="avatar" alt="image">
                                            <b class="fn">John Jones</b>
                                        </div>
                                        <div class="comment-metadata">
                                            <span>March 24, 2021 at 10:59 am</span>
                                        </div>
                                    </footer>
                                    <div class="comment-content">
                                        <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</p>
                                    </div>
                                    <div class="reply">
                                        <a href="blog-details.html" class="comment-reply-link">Reply</a>
                                    </div>
                                </article>
                                <ol class="children">
                                    <li class="comment">
                                        <article class="comment-body">
                                            <footer class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <img src="assets/img/user/user3.jpg" class="avatar" alt="image">
                                                    <b class="fn">Steven Smith</b>
                                                </div>
                                                <div class="comment-metadata">
                                                    <span>March 24, 2021 at 10:59 am</span>
                                                </div>
                                            </footer>
                                            <div class="comment-content">
                                                <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</p>
                                            </div>
                                            <div class="reply">
                                                <a href="blog-details.html" class="comment-reply-link">Reply</a>
                                            </div>
                                        </article>
                                        <ol class="children">
                                            <li class="comment">
                                                <article class="comment-body">
                                                    <footer class="comment-meta">
                                                        <div class="comment-author vcard">
                                                            <img src="assets/img/user/user4.jpg" class="avatar" alt="image">
                                                            <b class="fn">Sarah Taylor</b>
                                                        </div>
                                                        <div class="comment-metadata">
                                                            <span>March 24, 2021 at 10:59 am</span>
                                                        </div>
                                                    </footer>
                                                    <div class="comment-content">
                                                        <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</p>
                                                    </div>
                                                    <div class="reply">
                                                        <a href="blog-details.html" class="comment-reply-link">Reply</a>
                                                    </div>
                                                </article>
                                            </li>
                                        </ol>
                                    </li>
                                </ol>
                            </li>
                            <li class="comment">
                                <article class="comment-body">
                                    <footer class="comment-meta">
                                        <div class="comment-author vcard">
                                            <img src="assets/img/user/user5.jpg" class="avatar" alt="image">
                                            <b class="fn">John Doe</b>
                                        </div>
                                        <div class="comment-metadata">
                                            <span>March 24, 2021 at 10:59 am</span>
                                        </div>
                                    </footer>
                                    <div class="comment-content">
                                        <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</p>
                                    </div>
                                    <div class="reply">
                                        <a href="blog-details.html" class="comment-reply-link">Reply</a>
                                    </div>
                                </article>
                                <ol class="children">
                                    <li class="comment">
                                        <article class="comment-body">
                                            <footer class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <img src="assets/img/user/user6.jpg" class="avatar" alt="image">
                                                    <b class="fn">James Anderson</b>
                                                </div>
                                                <div class="comment-metadata">
                                                    <span>March 24, 2021 at 10:59 am</span>
                                                </div>
                                            </footer>
                                            <div class="comment-content">
                                                <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</p>
                                            </div>
                                            <div class="reply">
                                                <a href="blog-details.html" class="comment-reply-link">Reply</a>
                                            </div>
                                        </article>
                                    </li>
                                </ol>
                            </li>
                        </ol>
                        <div class="comment-respond">
                            <h3 class="comment-reply-title">Leave a Reply</h3>
                            <form class="comment-form">
                                <p class="comment-notes">
                                    <span id="email-notes">Your email address will not be published.</span>
                                    Required fields are marked <span class="required">*</span>
                                </p>
                                <p class="comment-form-author">
                                    <label>Name <span class="required">*</span></label>
                                    <input type="text" id="author" placeholder="Your Name*" name="author" required="required">
                                </p>
                                <p class="comment-form-email">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" id="email" placeholder="Your Email*" name="email" required="required">
                                </p>
                                <p class="comment-form-url">
                                    <label>Website</label>
                                    <input type="url" id="url" placeholder="Website" name="url">
                                </p>
                                <p class="comment-form-comment">
                                    <label>Comment</label>
                                    <textarea name="comment" id="comment" cols="45" placeholder="Your Comment..." rows="5" maxlength="65525" required="required"></textarea>
                                </p>
                                <p class="comment-form-cookies-consent">
                                    <input type="checkbox" value="yes" name="wp-comment-cookies-consent" id="wp-comment-cookies-consent">
                                    <label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label>
                                </p>
                                <p class="form-submit">
                                    <input type="submit" name="submit" id="submit" class="submit" value="Post A Comment">
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End FL Blog Details Area -->



<?php
get_footer();
