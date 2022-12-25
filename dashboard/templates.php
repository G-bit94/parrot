<div>
    <!-- Auto-complete/long-form/expoand/continue -->
    <div id="auto_complete_cmpnt" class="content-type">
        <div class="mt-4">
            <div class="my-2">
                <small class="fw-bold">Keep in mind</small>
                <div class="list-group border-0 py-1 rounded-3">
                    <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-2 bg-light" aria-current="true">
                        <i class="bi bi-info-circle-fill"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                                <p class="mb-0">For longer prompts, enter the text in the Canvas <i class="bi bi-arrow-right-square"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group my-2">
                <textarea class="form-control content-type-input form-control-sm mb-1 mb-1" rows="4" placeholder="Enter the text to be completed here..." minlength="20" maxlength="200" id="starter_context" required></textarea>
            </div>
            <button class="btn btn-sm btn-primary my-2" onclick="completeUserPrompt('sidebar', 'auto_complete')">Go</button>
        </div>
    </div>

    <!-- Paraphrase -->
    <div id="paraphrase_cmpnt" class="content-type">
        <div class="mt-2">
            <div class="list-group border-0 py-1 rounded-3">
                <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-2 bg-light" aria-current="true">
                    <i class="bi bi-info-circle-fill"></i>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <small class="mb-0 fw-bold">
                                Enter the text to be paraphrased in the Canvas <i class="bi bi-arrow-right-square"></i> <br>
                                then click on the button below
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-2 d-flex justify-content-end">
                <button class="btn btn-sm btn-primary rounded-3 shadow-sm" onclick="completeUserPrompt('sidebar', 'paraphrase')">Paraphrase <i class="bi bi-arrow-right"></i></button>
            </div>
        </div>
    </div>

    <!-- Article outline based on title and keywords -->
    <div id="article_outline_cmpnt" class="content-type">
        <div class="mt-4">
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="article_outline_title">Article title</small>
                <input class="form-control content-type-input form-control-sm mb-1 mb-1" rows="4" placeholder="Why working from home is great" maxlength="100" id="article_outline_title" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="article_outline_keywords">Article keywords</small>
                <input class="form-control content-type-input form-control-sm mb-1 mb-1" rows="4" placeholder="Type comma separated keywords" maxlength="100" id="article_outline_keywords" required />
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-sm btn-primary rounded-3 px-3" onclick="completeUserPrompt('sidebar', 'article_outline', 1);">Create outline</button>
                <button class="btn btn-sm btn-dark rounded-3 px-3" id="use-outline" onclick="completeUserPrompt('sidebar', 'article_outline', 2)">Use outline <i class="bi bi-arrow-right"></i></button>
            </div>
        </div>
    </div>

    <!-- Blog body based on title and keywords -->
    <div id="article_body_cmpnt" class="content-type">
        <div class="mt-4">
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="article_body_title">Article title</small>
                <input class="form-control content-type-input form-control-sm mb-1 mb-1" placeholder="Why working from home is great" maxlength="100" id="article_body_title" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="article_body_keywords">Article keywords</small>
                <input class="form-control content-type-input form-control-sm mb-1 mb-1" placeholder="Type comma separated keywords" maxlength="100" id="article_body_keywords" required />
            </div>

            <button class="btn btn-sm btn-primary" onclick="completeUserPrompt('sidebar', 'article_body', '')">Create article</button>
        </div>
    </div>

    <!-- Product description -->
    <div id="product_description_cmpnt" class="content-type">
        <div class="mt-4">
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="product_name">Product name</small>
                <input class="form-control content-type-input product-description form-control-sm mb-1 mb-1" rows="4" placeholder="LG G2 OLED" maxlength="100" id="product_name" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="brand_name">Brand name</small>
                <input class="form-control content-type-input product-description form-control-sm mb-1 mb-1" rows="4" placeholder="LG" maxlength="100" id="brand_name" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="product_category">Product category</small>
                <input class="form-control content-type-input product-description form-control-sm mb-1 mb-1" rows="4" placeholder="Clothing, Beauty, Gaming,  Jewellery etc." maxlength="100" id="product_category" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="product_features">Product features</small>
                <input class="form-control content-type-input product-description form-control-sm mb-1 mb-1" rows="4" placeholder="Type comma separated keywords" maxlength="100" id="product_features" required />
            </div>
            <button class="btn btn-sm btn-primary" onclick="completeUserPrompt('sidebar', 'product_description')">Go</button>
        </div>
    </div>

    <!-- YouTube captions-->
    <div id="youtube_caption_cmpnt" class="content-type">
        <div class="mt-4">
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="yt_caption_video_title">Video title</small>
                <input class="form-control content-type-input yt-caption form-control-sm mb-1 mb-1" placeholder="Mastering time management" maxlength="100" id="yt_caption_video_title" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="yt_caption_video_keywords">Video keywords</small>
                <input class="form-control content-type-input yt-caption form-control-sm mb-1 mb-1" placeholder="Scheduling, reminders, delegation" maxlength="100" id="yt_caption_video_keywords" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="yt_caption_video_category">Video category</small>
                <input class="form-control content-type-input yt-caption form-control-sm mb-1 mb-1" rows="4" placeholder="Self-help" maxlength="100" id="yt_caption_video_category" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="yt_caption_target_audience">Target audience</small>
                <input class="form-control content-type-input yt-caption form-control-sm mb-1 mb-1" placeholder="Students..." maxlength="100" id="yt_caption_target_audience" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="yt_caption_video_description">Video description</small>
                <textarea class="form-control content-type-input yt-caption form-control-sm mb-1 mb-1" rows="4" placeholder="Time management is an important skill to master...." minlength="20" maxlength="200" id="yt_caption_video_description" required></textarea>
            </div>
            <button class="btn btn-sm btn-primary" onclick="completeUserPrompt('sidebar', 'youtube_caption')">Go</button>
        </div>
    </div>

    <!-- YouTube description-->
    <div id="youtube_description_cmpnt" class="content-type">
        <div class="mt-4">
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="yt_description_video_title">Video title</small>
                <input class="form-control content-type-input yt-description form-control-sm mb-1 mb-1" placeholder="Mastering time management" maxlength="100" id="yt_description_video_title" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="yt_description_video_keywords">Video keywords</small>
                <input class="form-control content-type-input yt-description form-control-sm mb-1 mb-1" placeholder="Scheduling, reminders, delegation" maxlength="100" id="yt_description_video_keywords" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="yt_description_category">Video category</small>
                <input class="form-control content-type-input yt-description form-control-sm mb-1 mb-1" rows="4" placeholder="Self-help..." maxlength="100" id="yt_description_category" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="yt_description_target_audience">Target audience</small>
                <input class="form-control content-type-input yt-description form-control-sm mb-1 mb-1" placeholder="Students..." maxlength="100" id="yt_description_target_audience" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="yt_description_video_desc">Brief description</small>
                <textarea class="form-control content-type-input yt-description form-control-sm mb-1 mb-1" rows="4" placeholder="The video explains why time management is an important skill to master" minlength="20" maxlength="200" id="yt_description_video_desc" required></textarea>
            </div>
            <button class="btn btn-sm btn-primary" onclick="completeUserPrompt('sidebar', 'youtube_description')">Go</button>
        </div>
    </div>

    <!-- Email subject based on audience and context -->
    <div id="email_subject_cmpnt" class="content-type">
        <div class="mt-4">
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="email_subject_keywords">Email keywords</small>
                <input class="form-control content-type-input email-subject form-control-sm mb-1 mb-1" placeholder="Launch, new" maxlength="100" id="email_subject_keywords" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="email_subject_audience">Email audience</small>
                <input class="form-control content-type-input email-subject common-email-field form-control-sm mb-1 mb-1" placeholder="Affiliate marketing team" maxlength="100" id="email_subject_audience" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="email_subject_intent">Intent</small>
                <input class="form-control content-type-input email-subject common-email-field form-control-sm mb-1 mb-1" rows="4" placeholder="Brand awareness campaign" maxlength="100" id="email_subject_intent" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="email_subject_context">Email context</small>
                <input class="form-control content-type-input email-subject common-email-field form-control-sm mb-1 mb-1" placeholder="We're launching the campaign in a few days. Are you set?" maxlength="100" id="email_subject_context" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="email_subject_about">Tell us about you/your company/brand</small>
                <textarea class="form-control content-type-input email-subject common-email-field form-control-sm mb-1 mb-1" rows="4" placeholder="<?php echo $site_name; ?> is a company that helps everyone one write faster by leveraging AI technology..." minlength="20" maxlength="200" id="email_subject_about" required></textarea>
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-sm btn-primary rounded-3 px-2" onclick="completeUserPrompt('sidebar', 'email_subject');">Generate subject</button>
                <button class="btn btn-sm btn-dark rounded-3 px-2" id="use-outline" onclick="useCreatedEmailSubject()">Use subject <i class="bi bi-arrow-right"></i></button>
            </div>
        </div>
    </div>

    <!-- Email based on few inputs -->
    <div id="email_body_cmpnt" class="content-type">
        <div class="mt-4 row">
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="email_body_subject">Email subject</small>
                <input class="form-control content-type-input email-body form-control-sm mb-1 mb-1" placeholder="Affiliate marketing team" maxlength="100" id="email_body_subject" required />
            </div>
            <div class="form-group col-sm-6 mb-3">
                <small class="form-label fw-bold" for="email_body_from">From</small>
                <input class="form-control content-type-input email-body form-control-sm mb-1 mb-1" placeholder="Jane" maxlength="100" id="email_body_from" required />
            </div>
            <div class="form-group col-sm-6 mb-3">
                <small class="form-label fw-bold" for="email_body_to">To</small>
                <input class="form-control content-type-input email-body form-control-sm mb-1 mb-1" placeholder="Jay" maxlength="100" id="email_body_to" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="email_body_audience">Email audience</small>
                <input class="form-control content-type-input email-body form-control-sm mb-1 mb-1" placeholder="Affiliate marketing team" maxlength="100" id="email_body_audience" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="email_body_intent">Intent</small>
                <input class="form-control content-type-input email-body form-control-sm mb-1 mb-1" rows="4" placeholder="New brand awareness campaign" maxlength="100" id="email_body_intent" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="email_body_context">Email context</small>
                <input class="form-control content-type-input email-body form-control-sm mb-1 mb-1" placeholder="We're launching the campaign in a few days. Are you ready?" maxlength="100" id="email_body_context" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="email_body_about">Tell us about you/your company/brand</small>
                <textarea class="form-control content-type-input email-body form-control-sm mb-1 mb-1" rows="4" placeholder="<?php echo $site_name; ?> is a company that helps everyone one write faster by leveraging AI technology..." minlength="20" maxlength="200" id="email_body_about" required></textarea>
            </div>
        </div>
        <button class="btn btn-sm btn-primary" onclick="completeUserPrompt('sidebar', 'email_body')">Create email</button>
    </div>

    <!-- Ads copy -->
    <div id="ad_copy_cmpnt" class="content-type">
        <div class="mt-4">
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="ad_product_name">Product name</small>
                <input class="form-control content-type-input form-control-sm mb-1 mb-1" rows="4" placeholder="LG G2 OLED" maxlength="100" id="ads_product_name" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="ad_target_audience">Target audience</small>
                <input class="form-control content-type-input form-control-sm mb-1 mb-1" rows="4" placeholder="Graphic designers, gamers" maxlength="100" id="ad_target_audience" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="ad_product_category">Product category</small>
                <input class="form-control content-type-input form-control-sm mb-1 mb-1" rows="4" placeholder="Electronics, home, gaming" maxlength="100" id="ad_product_category" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="ad_product_description">Product description</small>
                <input class="form-control content-type-input form-control-sm mb-1 mb-1" rows="4" placeholder="The LG G2 takes your viewing experience to another level" 50" id="ad_product_description" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="ad_keywords">Video keywords</small>
                <input class="form-control content-type-input form-control-sm mb-1 mb-1" placeholder="OLED, HDR" maxlength="100" id="ad_keywords" required />
            </div>
            <button class="btn btn-sm btn-primary" onclick="completeUserPrompt('sidebar', 'ad_copy')">Go</button>
        </div>
    </div>
</div>