<div>
    <!-- Auto-complete/long-form/expoand/continue -->
    <div id="auto_complete_cmpnt" class="content-type">
        <div class="mt-4">
            <div class="mt-2">
                <small class="fw-bold">KEEP IN MIND</small>

                <div class="list-group border-0 py-1 rounded-3">
                    <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-2 bg-light" aria-current="true">
                        <i class="bi bi-chat-left"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                                <p class="mb-0">For longer prompts, enter the text in the Canvas <i class="bi bi-arrow-right-square"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <textarea class="form-control form-control-sm mb-1 mb-1" rows="4" placeholder="Enter the text to be completed here..." minlength="20" maxlength="200" id="starter_context" required></textarea>
            </div>
            <button class="btn btn-sm btn-primary" onclick="completeUserPrompt('sidebar', 'auto_complete')">Go</button>
        </div>
    </div>

    <!-- Paraphrase -->
    <div id="paraphrase_cmpnt" class="content-type">
        <div class="mt-2">
            <div class="list-group border-0 py-1 rounded-3">
                <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-2 bg-light" aria-current="true">
                    <i class="bi bi-chat-left"></i>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <small class="mb-0 fw-bold">Enter the text to be paraphrased in the Canvas <i class="bi bi-arrow-right-square"></i></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog outline based on title and keywords -->
    <div id="blog_outline_cmpnt" class="content-type">
        <div class="mt-4">
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="blog_outline_title">Blog title</small>
                <input class="form-control form-control-sm mb-1 mb-1" rows="4" placeholder="Why working from home is great" maxlength="50" id="blog_outline_title" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="blog_outline_keywords">Blog post keywords</small>
                <input class="form-control form-control-sm mb-1 mb-1" rows="4" placeholder="Type comma separated keywords" maxlength="50" id="blog_outline_keywords" required />
            </div>

            <button class="btn btn-sm btn-primary" onclick="completeUserPrompt('sidebar', 'blog_outline', '')">Go</button>
        </div>
    </div>

    <!-- Blog body based on title and keywords -->
    <div id="blog_body_cmpnt" class="content-type">
        <div class="mt-4">
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="blog_body_title">Blog title</small>
                <input class="form-control form-control-sm mb-1 mb-1" placeholder="Why working from home is great" maxlength="50" id="blog_body_title" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="blog_body_keywords">Blog post keywords</small>
                <input class="form-control form-control-sm mb-1 mb-1" placeholder="Type comma separated keywords" maxlength="50" id="blog_body_keywords" required />
            </div>

            <button class="btn btn-sm btn-primary" onclick="completeUserPrompt('sidebar', 'blog_body', '')">Go</button>
        </div>
    </div>

    <!-- Product description -->
    <div id="product_description_cmpnt" class="content-type">
        <div class="mt-4">
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="product_name">Product name</small>
                <input class="form-control form-control-sm mb-1 mb-1" rows="4" placeholder="LG G2 OLED" maxlength="50" id="product_name" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="brand_name">Brand name</small>
                <input class="form-control form-control-sm mb-1 mb-1" rows="4" placeholder="LG" maxlength="50" id="brand_name" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="product_features">Product features</small>
                <input class="form-control form-control-sm mb-1 mb-1" rows="4" placeholder="Type comma separated keywords" maxlength="50" id="product_features" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="product_category">Product category</small>
                <div class="dropdown">
                    <span class="btn btn-white border-secondary btn-sm mt-1 dropdown-toggle" type="button" id="productsMenu" data-bs-toggle="dropdown" aria-expanded="false">
                        Select category
                    </span>
                    <ul class="dropdown-menu pt-0 mx-0 rounded-3 shadow overflow-auto" aria-labelledby="productsMenu" style="width: 180px; height: 250px">
                        <li class="list-group-item list-group-item-action border-0 py-1 product-category">Home & Kitchen</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 product-category">Clothing</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 product-category">Shoes & Bags</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 product-category">Jewellery</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 product-category">Pet Supplies</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 product-category">Beauty</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 product-category">Sports & Outdoors</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 product-category">Electronics</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 product-category">Phones & Accessories</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 product-category">Health & Personal Care</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 product-category">Tools & Home Improvement</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 product-category">Toys & Games</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 product-category">Grocery & Gourmet Food</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 product-category">Patio, Lawn & Garden</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 product-category">Baby</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 product-category">Musical Instruments</li>
                    </ul>
                </div>
                <span class="btn btn-sm btn-light rounded-pill mt-2 w-75" style="display: none;" id="prod-disp-wrapper">
                    <span id="prod-disp-text"></span>
                    <span onclick="this.parentElement.style.display='none'">&times;</span>
                </span>
            </div>
            <button class="btn btn-sm btn-primary" onclick="completeUserPrompt('sidebar', 'product')">Go</button>
        </div>
    </div>

    <!-- YouTube captions-->
    <div id="youtube_captions_cmpnt" class="content-type">
        <div class="mt-4">
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="yt_caption_target_audience">Video title</small>
                <input class="form-control form-control-sm mb-1 mb-1" placeholder="Video title" maxlength="50" id="yt_caption_video_title" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="yt_caption_target_audience">Video keywords</small>
                <input class="form-control form-control-sm mb-1 mb-1" placeholder="Video keywords" maxlength="50" id="yt_caption_video_keywords" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="yt_caption_target_audience">Target audience</small>
                <input class="form-control form-control-sm mb-1 mb-1" placeholder="Type comma separated keywords" maxlength="50" id="yt_caption_target_audience" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="yt_captions_category">Video category</small>
                <div class="dropdown">
                    <span class="btn btn-white border-secondary btn-sm mt-1 dropdown-toggle" type="button" id="yt_captions_category" data-bs-toggle="dropdown" aria-expanded="false">
                        Select category
                    </span>
                    <ul class="dropdown-menu pt-0 mx-0 rounded-3 shadow overflow-auto" aria-labelledby="yt_captions_cats" style="width: 180px; height: 250px">
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-captions-category">Home & Kitchen</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-captions-category">Clothing</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-captions-category">Shoes & Bags</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-captions-category">Jewellery</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-captions-category">Pet Supplies</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-captions-category">Beauty</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-captions-category">Sports & Outdoors</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-captions-category">Electronics</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-captions-category">Phones & Accessories</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-captions-category">Health & Personal Care</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-captions-category">Tools & Home Improvement</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-captions-category">Toys & Games</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-captions-category">Grocery & Gourmet Food</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-captions-category">Patio, Lawn & Garden</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-captions-category">Baby</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-captions-category">Musical Instruments</li>
                    </ul>
                </div>
                <span class="btn btn-sm btn-light rounded-pill mt-2 w-75" style="display: none;" id="yt-captions-disp-wrapper">
                    <span id="yt-captions-category-disp-text"></span>
                    <span onclick="this.parentElement.style.display='none'">&times;</span>
                </span>
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="video_description">Video description</small>
                <textarea class="form-control form-control-sm mb-1 mb-1" rows="4" placeholder="Enter the text to be completed here..." minlength="20" maxlength="200" id="yt_caption_video_description" required></textarea>
            </div>
            <button class="btn btn-sm btn-primary" onclick="completeUserPrompt('sidebar', 'product')">Go</button>
        </div>
    </div>

    <!-- YouTube description-->
    <div id="youtube_description_cmpnt" class="content-type">
        <div class="mt-4">
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="yt_description_target_audience">Video title</small>
                <input class="form-control form-control-sm mb-1 mb-1" placeholder="Video title" maxlength="50" id="yt_description_video_title" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="yt_description_target_audience">Video keywords</small>
                <input class="form-control form-control-sm mb-1 mb-1" placeholder="Video keywords" maxlength="50" id="yt_description_video_keywords" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="yt_description_target_audience">Target audience</small>
                <input class="form-control form-control-sm mb-1 mb-1" placeholder="Type comma separated keywords" maxlength="50" id="yt_description_target_audience" required />
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="yt_description_category">Video category</small>
                <div class="dropdown">
                    <span class="btn btn-white border-secondary btn-sm mt-1 dropdown-toggle" type="button" id="yt_description_category" data-bs-toggle="dropdown" aria-expanded="false">
                        Select category
                    </span>
                    <ul class="dropdown-menu pt-0 mx-0 rounded-3 shadow overflow-auto" aria-labelledby="yt_description_cats" style="width: 180px; height: 250px">
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-description-category">Home & Kitchen</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-description-category">Clothing</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-description-category">Shoes & Bags</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-description-category">Jewellery</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-description-category">Pet Supplies</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-description-category">Beauty</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-description-category">Sports & Outdoors</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-description-category">Electronics</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-description-category">Phones & Accessories</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-description-category">Health & Personal Care</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-description-category">Tools & Home Improvement</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-description-category">Toys & Games</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-description-category">Grocery & Gourmet Food</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-description-category">Patio, Lawn & Garden</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-description-category">Baby</li>
                        <li class="list-group-item list-group-item-action border-0 py-1 yt-description-category">Musical Instruments</li>
                    </ul>
                </div>
                <span class="btn btn-sm btn-light rounded-pill mt-2 w-75" style="display: none;" id="yt-description-disp-wrapper">
                    <span id="yt-description-category-disp-text"></span>
                    <span onclick="this.parentElement.style.display='none'">&times;</span>
                </span>
            </div>
            <div class="form-group mb-3">
                <small class="form-label fw-bold" for="video_description">Video description</small>
                <textarea class="form-control form-control-sm mb-1 mb-1" rows="4" placeholder="Enter the text to be completed here..." minlength="20" maxlength="200" id="yt_caption_video_description" required></textarea>
            </div>
            <button class="btn btn-sm btn-primary" onclick="completeUserPrompt('sidebar', 'product')">Go</button>
        </div>
    </div>

    <!-- Email subject based on audience and context -->
    <div id="email-subject_cmpnt" class="content-type"></div>

    <!-- Email based on few inputs -->
    <div id="email-body_cmpnt" class="content-type"></div>

    <!-- Ads copy -->
    <div id="ads_cmpnt" class="content-type"></div>
</div>