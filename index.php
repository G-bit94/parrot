<?php

include "header.php";

?>

<style type="text/css">
    .masthead {
        background-image: linear-gradient(75deg,
                rgba(251, 215, 134, 0.50),
                rgba(247, 255, 255, 0.75),
                rgba(251, 215, 134, 0.30),
                rgba(5, 25, 255, 0.05));
    }

    .masthead h1 {
        font-size: calc(1.525rem + 3.3vw);
        line-height: 1
    }

    .fast {
        text-shadow: 3px 0 1px #3e3e3e, 6px 0 1px #777777, 8px 0 1px #dfdfdf !important;
        /* text-shadow: 2px 2px #FF0000; */
    }

    /* writers block section */
    #block {
        position: relative;
        padding: 15rem 0;
        /* background-image: url("<?php echo $base_url; ?>/assets/img/woman-writers-block.jpeg"); */
        background-image: linear-gradient(rgba(9.4, 20.4, 32.9, 0.6) 20%, rgba(0, 0, 0, 0.6) 86%), url("<?php echo $base_url; ?>/assets/img/woman-stressed.jpg");
        background-position: center;
        background-size: cover;
        color: white;
    }

    @media (min-width: 1200px) {
        .masthead h1 {
            font-size: 4rem
        }
    }
</style>

<span id="title" style="display: none;">AI Text Generator</span>

<div class="masthead">
    <div class="container col-xxl-8 mt-3 px-1 py-5">
        <div class="row align-items-center g-5 py-5">
            <div class="col-lg-6">
                <h1 class="lh-1 mb-4"><strong>High quality content in just a few clicks</strong></h1>
                <p class="lead mb-4">Write essays, articles, emails, ads... and so much more!
                    You'll be amazed how great ParrotAI speaks to the desires of your audience - at a fraction of the cost.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-lg btn-primary px-4 gap-3 fw-bold shadow-lg" onclick="handleStartBtn();">Start writing</button>
                    <button type="button" class="btn btn-lg btn-outline-dark px-4 fw-bold" onclick="popSignupModal();">Sign up</button>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
                    <span>
                        <i class="bi bi-lightning-fill fs-5 fast"></i>
                        <small class="fw-bold">Speed</small>
                    </span>
                    <span class="mx-4">
                        <i class="bi bi-gem fs-5"></i>
                        <small class="fw-bold">Quality</small>
                    </span>
                    <span>
                        <i class="bi bi-coin fs-5"></i>
                        <small class="fw-bold">Affordability</small>
                    </span>
                </div>
            </div>
            <div class="col-10 col-sm-8 col-lg-6 overflow-hidden">
                <img src="assets/img/main-transparent.png" class="d-block mx-lg-auto img-fluid rounded-lg-5" alt="" width="700" loading="lazy">
            </div>
        </div>
    </div>
</div>

<div class="container px-4 py-5" id="services">
    <h1 class="display-5 fw-bold">ParrotAI is for you</h1>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class="feature col" type="button">
            <div class="border rounded-5 shadow-sm pt-5 px-3 pb-3">
                <div class="feature-icon">
                    <img src="assets/img/typing.png" alt="" />
                </div>
                <h4 class="fw-bold mt-4 mb-0">Writers</h4>
                <p>Submit that essay or article without the nail-biting anxiety of beating deadlines.
                </p>
            </div>
        </div>
        <div class="feature col" type="button">
            <div class="border rounded-5 shadow-sm pt-5 px-3 pb-3">
                <div class="feature-icon">
                    <img src="assets/img/digital-marketing.png" alt="" />
                </div>
                <h4 class="fw-bold mt-4 mb-0">Marketers</h4>
                <p>Are you an SEO or copywriter? Transform your ideas into engaging content and irresistible copy.</p>
            </div>
        </div>
        <div class="feature col" type="button">
            <div class="border rounded-5 shadow-sm pt-5 px-3 pb-3 ">
                <div class="feature-icon">
                    <img src="assets/img/developer.png" alt="" />
                </div>
                <h4 class="fw-bold mt-4 mb-0">Anyone, everyone</h4>
                <p>Regardless of your proficiency, generate clear, grammatically-correct English sentences based on your inputs.</p>
            </div>
        </div>
    </div>
</div>

<div class="masthead my-0">
    <div class="container px-4 py-5">
        <h2 class="pb-2 border-bottom fw-bold">Scale your content creation like a pro</h2>

        <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
            <div class="d-flex flex-column align-items-start gap-2">
                <h3 class="fw-bold">A plethora of use-cases.</h3>
                <p class="text-muted">From magical converting content for your blog, to user bios and product descriptions, anything goes.
                    ParrotAI generates text from scratch. It is an AI assistant that can write for you in any style or format you want.
                    Your imagination is literally the limit here!</p>
                <button onclick="handleStartBtn()" class="btn btn-primary btn-lg fw-bold shadow">Start now</button>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 g-4 d-flex">
                <div class="d-flex flex-column gap-2 p-1">
                    <div class="border rounded-5 shadow p-3">
                        <div class="feature-icon-small d-inline-flex align-items-center justify-content-start text-bg-primary bg-gradient fs-4 rounded-3">
                            <i class="bi bi-google fs-3"></i>
                        </div>
                        <h4 class="fw-bold fs-5 my-1">SEO-optimized posts</h4>
                        <p class="text-muted">ParrotAI is trained on human-written SEO content so you can <strong>create search engine optimized content</strong> in minutes!</p>
                    </div>
                </div>

                <div class="d-flex flex-column gap-2 p-1">
                    <div class="border rounded-5 shadow p-3">
                        <div class="feature-icon-small d-inline-flex align-items-center justify-content-start text-bg-primary bg-gradient fs-4 rounded-3">
                            <i class="bi bi-badge-ad fs-3"></i>
                        </div>
                        <h4 class="fw-bold fs-5 my-1">Converting ad copy</h4>
                        <p class="text-muted">Craft converting ad copy that's spurs the desired actions from your target audience and <strong>increase ad conversion rates</strong>.</p>
                    </div>
                </div>

                <div class="d-flex flex-column gap-2 p-1">
                    <div class="border rounded-5 shadow p-3">
                        <div class="feature-icon-small d-inline-flex align-items-center justify-content-start text-bg-primary bg-gradient fs-4 rounded-3">
                            <i class="bi bi-instagram fs-3"></i>
                        </div>
                        <h4 class="fw-bold fs-5 my-1">Social media posts</h4>
                        <p class="text-muted"><strong>Generate engaging social media posts</strong> for your brand campaigns on any platform with unparalleled ease.</p>
                    </div>
                </div>

                <div class="d-flex flex-column gap-2 p-1">
                    <div class="border rounded-5 shadow p-3">
                        <div class="feature-icon-small d-inline-flex align-items-center justify-content-start text-bg-primary bg-gradient fs-4 rounded-3">
                            <i class="bi bi-pen fs-3"></i>
                        </div>
                        <h4 class="fw-bold fs-5 my-1">Anything, everything</h4>
                        <p class="text-muted">From <strong>refactoring existing content</strong> to crafting impressive articles and essays from scratch, it's entirely up to you!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container col-xxl-8 mt-3 px-1 py-5">
    <div class="row align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-7 overflow-hidden border shadow-lg rounded-5">
            <img src="assets/img/dashboard.png" class="d-block mx-lg-auto img-fluid rounded-lg-5" alt="" width="700" loading="lazy">
        </div>
        <div class="col-lg-5">
            <div class="ms-5">
                <h4 class="lh-1 mb-4"><strong>We know creating quality content is time-consuming, but it doesn't have to be.</strong></h4>
                <p class="lead mb-4">Our AI allows you to write unique, naturally flowing content with just the click of a button, drastically cutting down writing time. That's why writers love it.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-primary px-4 gap-3" onclick="location.href='#reviews'"><i class="bi bi-star-fill"></i> See why agencies and freelancers love it</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="px-4 py-5 my-5 text-center bg-white">
    <h3 class="fw-bold fs-3 my-5">We know creating quality content is time-consuming, but it doesn't have to be.</h3>
    <div class="col-lg-6 mx-auto my-5">
        <p class="lead my-5">Our AI allows you to write unique, naturally flowing content with just the click of a button, drastically cutting down writing time. That's why writers love it.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <button type="button" class="btn btn-primary btn-lg px-4 gap-3" onclick="location.href='#reviews'"><i class="bi bi-star-fill"></i> See why agencies and freelancers love it</button>
        </div>
    </div>
</div> -->

<div class="masthead">
    <div class="container col-xxl-8 mt-3 px-1 py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h3 class="lh-1 mb-4"><strong>ParrotAI gives you writing superpowers</strong></h3>
                <p class="lead mb-4 text-muted">Among those is the ability to forever overcome writers block allowing you to create amazing content faster and unfatigued.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-lg btn-primary px-4 gap-3 fw-bold shadow-lg" onclick="handleStartBtn();">Claim your superpowers</button>
                </div>
            </div>
            <div class="col-10 col-sm-8 col-lg-6 overflow-hidden bg-white border shadow-lg rounded-5">
                <div>
                    <h4 class="fw-bold fs-4 py-2 my-2 text-center">Forget writer's block forever</h4>
                    <img src="<?php echo $base_url; ?>/assets/img/woman-writers-block.jpeg" class="d-block mx-lg-auto img-fluid rounded-lg-3" alt="" width="200" loading="lazy">
                </div>

                <div class="d-flex justify-content-around mx-5 my-2">
                    <i class="bi bi-caret-down-fill text-primary fs-2 fw-bold"></i>
                </div>
                <div class="mt-1">
                    <img src="assets/img/woman-parrot-dashboard-transparent.png" class="d-block mx-lg-auto img-fluid rounded-lg-3" alt="" width="700" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</div>

<div id="reviews" class="mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 text-center mt-5 mb-4">
                <h3 class="my-4">Trusted by the big brands. <i class="bi bi-heart-fill text-danger"></i> Loved by 5,000+ small businesses and freelancers</h3>
                <h2 class="fw-bold">And don't just take our word for it</h2>
            </div>
        </div>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3 g-2">
            <div class="col text-dark mt-2" data-bs="fade-up" data-bs-duration="300">
                <div class="p-4 bg-light shadow-sm border rounded-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="assets/img/reviews/4FNY3NGQEHYZJMKTTQINBZQKTH-min.jpg" alt="" width="35" height="35" class="rounded-circle mx-2" />
                        <p class="m-0">Anshul Jain</p>
                    </div>
                    <p class="mt-3"></p>
                    <p>After trying out all the other AI writing tools (Jarvis etc.), I stumbled upon ParrotAI. And I'm glad I did. It's helped me double my writing output myself, and I'm training my writing team to use it as well. Took less than a month for me to recover my investment in the LTD - absolutely worth it. And Kelvin is one of the best developers I've seen - always prompt to respond and he's actively developing it further. Can't wait for ParrotAI to go all the way to the moon!</p>
                    <p></p>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Freelance Content Writer</p>
                        <p class="mb-0">Product Hunt</p>
                    </div>
                </div>
            </div>
            <div class="col text-dark mt-2" data-bs="fade-up" data-bs-duration="300">
                <div class="p-4 bg-light shadow-sm border rounded-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="assets/img/reviews/ZXN8VGV4NELE5F2WOORYVI90TH-min.jpg" alt="" width="35" height="35" class="rounded-circle mx-2">
                        <p class="m-0">Marcos Ruvalcaba</p>
                    </div>
                    <p class="mt-3"></p>
                    <p>ParrotAI is perfect for those of you who are serious about taking advantage of a world-class AI writing tool. &nbsp;</p>
                    <p>It's not just for writers and direct marketers. Anyone can use these proven tools for stronger results in any area of their life. I'm also a student and it helps me with writer's block! &nbsp;</p>
                    <p>This is a truly remarkable product and I highly recommend it! I can't wait to see what else Kelvin brews into the tool!</p>
                    <p>I'm crossing my fingers and hope to get an integrated Fact Checker by Christmas. ;)</p>
                    <p></p>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Just a dude doing dude things</p>
                        <p class="mb-0">via Product Hunt</p>
                    </div>
                </div>
            </div>
            <div class="col text-dark mt-2" data-bs="fade-up" data-bs-duration="300">
                <div class="p-4 bg-light shadow-sm border rounded-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="assets/img/reviews/profile-min.png" alt="" width="35" height="35" class="rounded-circle mx-2">
                        <p class="m-0">Catherine Rzecki</p>
                    </div>
                    <p class="mt-3"></p>
                    <p>I only took 1 hour ago to produce a beautiful blog post. I have to tell you ... this ParrotAI is phenomenal !! I bought Jarvis only 2 days ago but it's NOTHING compared to this.
                        I'm honestly astounded at how "intelligent" it is. My blog post is way better than anything I could have produced. With Jarvis I had to spend a lot of time re-writing,
                        but with ParrotAI I didn't need to rewrite anything. I also have Spin Rewriter but again I have to spend so much time making so many changes because the finished article made no sense.
                        I'll be cancelling Jarvis, for sure!! And I won't be using Spin Rewriter again. I'm very slow with ParrotAI naturally, but when I've read all the help documents and done a tour, I can see I'll be using it every day.
                        You're a lifesaver. 😀 CONGRATULATIONS on a beautiful, intelligent, and amazing product 😀 Sincerely, Catherine Rzecki ❤</p>
                    <p></p>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0"></p>
                        <p class="mb-0">via Email</p>
                    </div>
                </div>
            </div>
            <div class="col text-dark mt-2" data-bs="fade-up" data-bs-duration="300">
                <div class="p-4 bg-light shadow-sm border rounded-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="assets/img/reviews/P2HTGIRNW3XJMC8LFBA1YE1XTH-min.jpg" alt="" width="35" height="35" class="rounded-circle mx-2">
                        <p class="m-0">Max Bissolati</p>
                    </div>
                    <p class="mt-3"></p>
                    <p>It's a really great product, in what is becoming a competitive niche.</p>
                    <p>I find myself using ParrotAI every day and I look forward to seeing it evolve in the coming years. The community on Facebook, along with Kelvin, seems to be the secret sauce for such an amazing product.</p>
                    <p>I can't recommend ParrotAI any more highly! :)</p>
                    <p>To the moon 🚀</p>
                    <p></p>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Just a Marketer on a Journey</p>
                        <p class="mb-0">via Product Hunt</p>
                    </div>
                </div>
            </div>

            <div class="col text-dark mt-2" data-bs="fade-up" data-bs-duration="300">
                <div class="p-4 bg-light shadow-sm border rounded-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="assets/img/reviews/OGHMWK0HFPPJDTD8TVDIHMLZTH-min.jpg" alt="" width="35" height="35" class="rounded-circle mx-2">
                        <p class="m-0">Alaa Bananaamah</p>
                    </div>
                    <p class="mt-3"></p>
                    <p>I've been using ParrotAI for a while now, and it's really amazing how much it can help you produce high-quality content quickly. It has a very simple and easy-to-use UI, which makes it a joy to work with.
                        It's also cheaper than other alternatives. I think that will be really useful to all kinds of writers and developers. A great product, and I highly recommend it.</p>
                    <p>A few weeks ago I got an email from a friend who asked me to help him with his upcoming project. He was looking for some software that could help him generate content for his website in a way that would be SEO optimized and unique at the same time. He wanted to have something that would allow him to write short paragraphs of text and then have it automatically generated</p>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Freelance Software developer</p>
                        <p class="mb-0">Product Hunt</p>
                    </div>
                </div>
            </div>
            <div class="col text-dark mt-2" data-bs="fade-up" data-bs-duration="300">
                <div class="p-4 bg-light shadow-sm border rounded-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="assets/img/reviews/I5ZLINFAKZWHTCBNPRCS4V3FTH-min.jpg" alt="" width="35" height="35" class="rounded-circle mx-2">
                        <p class="m-0">Archana K</p>
                    </div>
                    <p class="mt-3">I can actually go on and on about ParrotAI!It makes me so confident now. If I get stuck with writing, I know it's like my little buddy out there.I bought this even before the launch of AI (paperwhite)While am more excited about AI features, I love the guidelines templates even more.. I love marketing, and for this, the flow is very essential. It helps me with the flow naturally. I love that it allows me to learn the art of copywriting than anything else.And I must mention, Kelvin is very open to helping you with your copywriting journey. Whether it's the app, or a skill about copy, he is always there to support you.Thanks for such an amazing product Kelvin,</p>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">The Marketing Vogue</p>
                        <p class="mb-0">Website</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a type="button" class="btn btn-primary btn-lg rounded-5 px-4 fw-bold empty-link" href="<?php echo $base_url; ?>/dashboard" onclick="handleStartBtn()">Find out yourself <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</div>

<div class="masthead mt-5 py-5">
    <div class="px-4 mt-5 py-5 text-center">
        <h4><strong class="display-5 fw-bolder my-5">ParrotAI isn't just your writing assistant. It is your wingman...</strong></h4>
        <div class="col-lg-6 mx-auto my-5">
            <p class="lead mb-4 mt-5">A wingman who's ready to take on that writing challenge with you.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-5">
                <a type="button" class="btn btn-dark btn-lg rounded-5 px-4 p-3 fw-bold empty-link" href="<?php echo $base_url; ?>/dashboard" onclick="popSignupModal()">Try ParrotAI now <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>

<?php

include "footer.php";

?>