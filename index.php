<?php

include "header.php";

?>
<span id="title" style="display: none;">AI Text Generator</span>

<div class="container col-xxl-8 mt-5 px-4 py-5">
    <div class="row align-items-center g-5 py-4">
        <div class="col-lg-6">
            <h1 class="display-4 fw-bold lh-1 mb-3"><strong>High quality content in just a few seconds</strong></h1>
            <p class="lead">Write essays, articles, emails... and so much more!
                You'll be amazed how great ParrotAI speaks to the desires of your clients. At a fraction of the cost.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3" onclick="handleStartBtn();">Start writing</button>
                <!-- <button type="button" class="btn btn-outline-primary btn-lg px-4" onclick="location.href='<?php echo $base_url; ?>/#demo'">View demo</button> -->
            </div>
        </div>
        <div class="col-10 col-sm-8 col-lg-6 overflow-hidden shadow-lg">
            <img src="assets/img/main.jpg" class="d-block mx-lg-auto img-fluid rounded-lg-3" alt="" width="700" loading="lazy">
        </div>
    </div>
</div>


<div class="bg-primary text-light">
    <div class="container px-4 py-5" id="services">
        <h1 class="display-5 fw-bold">ParrotAI is for everyone</h1>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="feature col" type="button">
                <div class="border rounded-3 pt-5 px-3 pb-3">
                    <div class="feature-icon">
                        <img src="assets/img/typing.png" alt="" />
                    </div>
                    <h4 class="fw-bold mt-4 mb-0">Writers</h4>
                    <p>Submit that essay or article without the nail-biting anxiety of beating deadlines due writer's block
                    </p>
                </div>
            </div>
            <div class="feature col" type="button">
                <div class="border rounded-3 pt-5 px-3 pb-3">
                    <div class="feature-icon">
                        <img src="assets/img/digital-marketing.png" alt="" />
                    </div>
                    <h4 class="fw-bold mt-4 mb-0">Marketers</h4>
                    <p>Are you an SEO or copywriter? Transform your ideas into engaging content and irresistible copy</p>
                </div>
            </div>
            <div class="feature col" type="button">
                <div class="border rounded-3 pt-5 px-3 pb-3 ">
                    <div class="feature-icon">
                        <img src="assets/img/developer.png" alt="" />
                    </div>
                    <h4 class="fw-bold mt-4 mb-0">Developers</h4>
                    <p>Here's your wingman. Autocomplete code in whatever language, and write amazing content for your website</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="px-4 py-5 my-5 text-center bg-light">
    <h3 class="fw-bold display-6 my-4">Content is time-consuming to create, but it doesn't have to be</h3>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Our AI allows you to write entire, unique, naturally flowing content with just the click of a button, drastically cutting down the time and money needed. That's why Freelancers love it.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <button type="button" class="btn btn-primary btn-lg px-4 gap-3" onclick="location.href='#reviews'"><i class="bi bi-star-fill"></i> See why Freelancers love it </button>
        </div>
    </div>
</div>


<div class="px-4 py-5 my-3 text-center" id="block">
    <h2 class="display-5 fw-bold my-5">Struggling with writer's block?</h2>
    <div class="col-lg-6 mx-auto my-5">
        <p class="lead mb-4">We all do at some point. But you don't have to anymore</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a type="button" class="btn btn-primary btn-lg px-4 gap-3" href="#demo">Let the Parrot help</a>
        </div>
    </div>
</div>


<!-- <div class="container px-2 py-5 my-2 mb-3" id="demo">
    <div class="card-header bg-primary text-white fw-bold fs-5"><strong>AI Text Generator - Try it out</strong></div>
    <div class="row my-3">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <textarea class="form-control border-teal mb-4" rows="10" placeholder="Enter prompt" id="prompt_text"></textarea>
            </div>
            <span class="btn btn-primary rounded-pill my-2" onclick="completeDemoPrompt()" type="button">
                <span id="gen-text-spinner" style="display: none;">
                    <span class="spinner-border spinner-border-sm text-white" role="status"></span>
                </span>
                <span id="gen-text">Generate text</span>
            </span>
        </div>
        <div class="col-md-6 feature col">
            <div class="border rounded-3 pt-5 px-3 pb-3">
                <span id="prompt" class="mt-2 p-1 mb-0"></span>
                <textarea id="outputarea" class="form-control border-0 bg-white fw-bold p-4" rows="5" placeholder="The generated text will appear here" readonly></textarea>
            </div>
        </div>
    </div>
    <p class="mt-4 lead fs-4 bd-callout">
        <strong>Enjoy more perks and have more fun with the Parrot by using the full-featured version <button style="background-color: #0a58ca;" class="btn btn-sm text-white fw-bold shadow" onclick="handleStartBtn()">here</button></strong>
    </p>
</div> -->



<div id="reviews" class="border pb-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1 text-center mt-5 mb-4">
                <h2 class="fw-bold">We gathered several comments from our customers</h2>
            </div>
        </div>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3 g-2">
            <div class="col text-light mt-2" data-bs="fade-up" data-bs-duration="300">
                <div class="p-4 bg-primary rounded-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="assets/img/reviews/4FNY3NGQEHYZJMKTTQINBZQKTH-min.jpg" alt="" width="35" height="35" class="rounded-circle mx-2" />
                        <p class="m-0">Anshul Jain</p>
                    </div>
                    <p class="mt-3"></p>
                    <p>After trying out all the other major AI writing tools (Jarvis, Rytr, Copy.ai, Writesonic, and more), I stumbled upon ParrotAI. And I'm glad I did. It's helped me double my writing output myself, and I'm training my writing team to use it as well. Took less than a month for me to recover my investment in the LTD - absolutely worth it. And Kelvin is one of the best developers I've seen - always prompt to respond and he's actively developing it further. Can't wait for ParrotAI to go all the way to the moon!</p>
                    <p></p>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Freelance Content Writer</p>
                        <p class="mb-0">Product Hunt</p>
                    </div>
                </div>
            </div>
            <div class="col text-light mt-2" data-bs="fade-up" data-bs-duration="300">
                <div class="p-4 bg-primary rounded-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="assets/img/reviews/ZXN8VGV4NELE5F2WOORYVI90TH-min.jpg" alt="" width="35" height="35" class="rounded-circle mx-2">
                        <p class="m-0">Marcos Ruvalcaba</p>
                    </div>
                    <p class="mt-3"></p>
                    <p>ParrotAI is perfect for those of you who are serious about taking advantage of a world-class AI writing tool. &nbsp;</p>
                    <p>It's not just for direct marketers. Anyone can use these proven tools for stronger results in any area of their life. I'm also a student and it helps me with writer's block! &nbsp;</p>
                    <p>This is a truly remarkable product and I highly recommend it! I can't wait to see what else Kelvin brews into the tool!</p>
                    <p>I'm crossing my fingers and hope to get an integrated Fact Checker by Christmas. ;)</p>
                    <p></p>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Just a dude doing dude things</p>
                        <p class="mb-0">via Product Hunt</p>
                    </div>
                </div>
            </div>
            <div class="col text-light mt-2" data-bs="fade-up" data-bs-duration="300">
                <div class="p-4 bg-primary rounded-3">
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
            <div class="col text-light mt-2" data-bs="fade-up" data-bs-duration="300">
                <div class="p-4 bg-primary rounded-3">
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
            <div class="col text-light mt-2" data-bs="fade-up" data-bs-duration="300">
                <div class="p-4 bg-primary rounded-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="assets/img/reviews/profile-min.png" alt="" width="35" height="35" class="rounded-circle mx-2">
                        <p class="m-0">David Maynar</p>
                    </div>
                    <p class="mt-3">This tool is by far the best one I have EVER tried. And the AI that they use is just out of this world...I honestly don't think there is a better deal on the internet for writing software...Do yourself a favor, and get this RIGHT NOW!</p>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Entrepreneur, digital marketer and agency owner</p>
                        <p class="mb-0">Website</p>
                    </div>
                </div>
            </div>


            <div class="col text-light mt-2" data-bs="fade-up" data-bs-duration="300">
                <div class="p-4 bg-primary rounded-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="assets/img/reviews/FCGU5MQ4JYC6XBWIVRXCRLRDTH-min.jpg" alt="" width="35" height="35" class="rounded-circle mx-2">
                        <p class="m-0">Shakil Ahmed</p>
                    </div>
                    <p class="mt-3"></p>
                    <p>Great Writing AI tool and Founder Kelvin is also a amazing man.</p>
                    <p></p>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">An SEO expert</p>
                        <p class="mb-0">Product Hunt</p>
                    </div>
                </div>
            </div>
            <div class="col text-light mt-2" data-bs="fade-up" data-bs-duration="300">
                <div class="p-4 bg-primary rounded-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="assets/img/reviews/OGHMWK0HFPPJDTD8TVDIHMLZTH-min.jpg" alt="" width="35" height="35" class="rounded-circle mx-2">
                        <p class="m-0">Alaa Bananaamah</p>
                    </div>
                    <p class="mt-3"></p>
                    <p>I've been using ParrotAI for a while now, and it's really amazing how much it can help you produce high-quality content quickly. It has a very simple and easy-to-use UI, which makes it a joy to work with.
                        It's also cheaper than other alternatives. I think that will be really useful to all kinds of writers and developers. A great product, and I highly recommend it.</p>
                    <p></p>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Freelance Software developer</p>
                        <p class="mb-0">Product Hunt</p>
                    </div>
                </div>
            </div>
            <div class="col text-light mt-2" data-bs="fade-up" data-bs-duration="300">
                <div class="p-4 bg-primary rounded-3">
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
            <div class="col text-light mt-2" data-bs="fade-up" data-bs-duration="300">
                <div class="p-4 bg-primary rounded-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="assets/img/reviews/founder.png" alt="" width="35" height="35" class="rounded-circle mx-2">
                        <p class="m-0">Kelvin</p>
                    </div>
                    <p class="mt-3">It is amazing how the AI has been helpful to us in building this tool. We generated most of the website content you see here using The Parrot, as we like calling the AI. And that's just the beginning. We know we'll discover more use-cases, as we develop and fine-tune the tool, and we'll be more than happy to rollout these to our users once ready. Frankly, I know we'd be stuck in the time history forgot if we didn't rely on the tool.</p>
                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Founder</p>
                        <p class="mb-0">ParrotAI</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="my-3 container border-top border-bottom d-flex justify-content-center">
    <div class="col-lg-6 mt-2">
        <div class="text-center">
            <h2 class="my-3">What else makes us different?</h2>
            <h4>Here's what</h4>
        </div>
        <div class="col-lg mt-5 box">
            <div class="ribbon ribbon-top-right">
                <span>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                </span>
            </div>
            <div class="list-group border-0 bg-light p-1">
                <div class="list-group-item border-0 d-flex gap-3 py-3">
                    <i class="bi bi-star-fill"></i>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <strong>No Limits</strong>
                            <p class="mb-0">You'll never run into any AI writing limits (Unlimited plan).</p>
                        </div>
                    </div>
                </div>
                <div class="list-group-item border-0 d-flex gap-3 py-3 bg-light">
                    <i class="bi bi-star-fill"></i>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <strong>No Filters</strong>
                            <p class="mb-0">You'll never run into any restrictions or content filters. We own our AI and support all kinds of topics.</p>
                        </div>
                    </div>
                </div>
                <div class="list-group-item border-0 d-flex gap-3 py-3">
                    <i class="bi bi-star-fill"></i>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <strong>No Upsells</strong>
                            <p class="mb-0">You'll will never be upsold: Our plans cover all future innovations and upgrades.</p>
                        </div>
                    </div>
                </div>
                <div class="list-group-item border-0 d-flex gap-3 py-3 bg-light">
                    <i class="bi bi-star-fill"></i>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <strong>Custom AI</strong>
                            <p class="mb-0">You can feed our AI with your own sample data. Competitors limit you to pre-written "universal" templates.
                                This leads to average AI content. With us, you can use your own sample data. This leads to super-targeted AI content.</p>
                        </div>
                    </div>
                </div>
                <div class="list-group-item border-0 d-flex gap-3 py-3">
                    <i class="bi bi-star-fill"></i>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <strong>Search Engine Optimization</strong>
                            <p class="mb-0">You can research currently ranking websites, get insights and use them as the foundation to optimize your own unique blogs/articles/EVERYTHING.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center my-5">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3" onclick="handleStartBtn();">Let's go</button>
            </div>
        </div>
    </div>
</div>

<div class="border-bottom">
    <div class="container col-xxl-8 my-2 px-4 py-2">
        <div class="row flex-lg align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="assets/img/blog.jpg" class="d-block mx-lg-auto img-fluid border rounded-3 shadow-lg" alt="" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h3 class="display-4 fw-bold lh-1 mb-3">News and Insights</h3>
                <p class="lead">Stay in the know. Get viewpoints on how to make the most out of ParrotAI.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="#!" class="btn btn-outline-primary btn-lg px-4">Read blog <i class="bi bi-caret-right-fill"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include "footer.php";

?>