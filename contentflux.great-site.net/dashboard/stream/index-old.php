<?php

// error_reporting(0);

header("Content-Type:application/json");

include "../../session.php";

$response = [];

function generateText()
{

    function curlRequest($url, $api, $key)
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        $command = $_POST['command'];

        // Set important params
        $_POST["stop"] = "<|endoftext|>";

        $_POST["max_tokens"] = $_POST["word_count"];

        //Type cast necessary numerical params
        $_POST['temperature'] = (float) $_POST['creativity'];

        /**
         * NOTE: Should be a factor of 4 for GooseAI      
         */
        $length = (int) $_POST['max_tokens'];

        $length = ceil($length);

        if ($length == 0)
            $length = 2;
        $_POST['max_tokens'] = $length;

        if ($api === 'Goose') {

            //Set the Authorization header
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization: Bearer ' . $key));

            $_POST['frequency_penalty'] = 1.0;

            // Remove unnecessary parameters in Goose API request
            $rm_array = array('rem_input');
        } elseif ($api === 'Eleuther') {

            // Set headers to spoof browser request    
            $headers = array(
                'POST /completion HTTP/1.1',
                'Host: api.eleuther.ai',
                'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0',
                'Accept: application/json',
                'Accept-Language: en-US,en;q=0.5',
                'Accept-Encoding: gzip, deflate, br',
                'Referer: https://6b.eleuther.ai/',
                'Content-Type: application/json',
                'Content-Length: 95',
                'Origin: https://6b.eleuther.ai',
                'Connection: keep-alive',
                'Sec-Fetch-Dest: empty',
                'Sec-Fetch-Mode: cors',
                'Sec-Fetch-Site: same-site'
            );

            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            // Set parameters in Eleuther API request
            $rm_array = array('prompt', 'max_tokens', 'temperature', 'stop', 'rem_input');

            $_POST['context'] = $_POST['prompt'];
            $_POST['top_p'] = 0.9;
            $_POST['temp'] = $_POST['temperature'];
            $_POST['response_length'] = $length;
            $_POST['remove_input'] = true;
        } elseif ($api === 'OpenAI') {
            //Set the Authorization header
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization: Bearer ' . $key));

            $rm_array = array('command', 'rem_input', 'stop', 'word_count', 'creativity', 'tone');
            $_POST['model'] = 'text-davinci-003';

            /**
             * Prompts
             */
            // include 'prompts.php';                
            switch ($command) {
                    // case ('auto_complete'):
                    //     $_POST['template_name'] = 'auto_complete';
                    //     break;
                case ('paraphrase'):
                    $_POST["prompt"] = "I need an SEO and copywriting expert to demonstrate how GPT-3 can be used to 
                    paraphrase or rewrite content in an accurate way
                    The name of the expert is Kelvin G. Cross, CEO of SineCortex.
                    What information do you need from me to rewrite the content without losing meaning Kelvin?
                    For me to paraphrase the content, you will need to provide:
                    The content to be rewritten
                    Once you have provided this content, I will rewrite it accurately using as few words in the suppliead
                    content without losing meaning.
                    Ok, here you go:
                    Content to paraphrase: “" . $_POST['prompt'] . "”                                    
                    Now rewrite the content as accurately as possible and keep the tone " .  $_POST['tone'] . ":";
                    array_push($rm_array, 'article_body_title', 'article_body_keywords');
                    break;
                case ('article_outline'):
                    // exit;
                    $step = $_POST['article_outline_step'];
                    switch ($step) {
                        case 1:
                            $_POST["prompt"] = "I need an SEO and copywriting expert to demonstrate how GPT-3 can be used to write 
                    an interesting and informative article outline about " .  $_POST['article_outline_title'] . ".
                    The name of the expert is Kelvin G. Cross, CEO of SineCortex.
                    What information do you need from me to generate an article outline Kelvin?
                    For me to generate an article outline, you will need to provide:
                    The topic of the article
                    Any desired keywords or topics to focus on
                    Once you have provided this information, I will create a befitting article outline                     
                    that meets your specifications for you to approve.
                    Ok, here you go:
                    Topic: “" . $_POST['article_outline_title'] . "”
                    Length: 100 words MAXIMUM
                    Keywords to include in relevant places: “" . $_POST["article_outline_keywords"] . "”
                    Now create a superb 7 paragraph article outline and keep the tone " .  $_POST['tone'] . ":";
                            break;
                        case 2:
                            $_POST["prompt"] = "I need an SEO and copywriting expert to demonstrate how GPT-3 can be used to write 
                    an interesting and informative article about " .  $_POST['article_outline_title'] . ".
                    The name of the expert is Kelvin G. Cross, CEO of SineCortex.
                    What information do you need from me to generate an article Kelvin?
                    For me to generate an article you will need to provide:
                    The topic of the article
                    The length of the article
                    Any desired keywords or topics to focus on
                    Once you have provided this information, I will create a FULL & COMPREHENSIVE informative 
                    article that meets your specifications.
                    Ok, here you go:
                    Topic: “" . $_POST['article_outline_title'] . "”
                    Length: " . $length . " words MINIMUM
                    Keywords to include in relevant places: “" . $_POST["article_outline_keywords"] . "”
                    Now create an interesting and informative, full, elaborate and 
                    comprehensive article using the following paragraph outline: " . $_POST["article_outline_context"] . ".
                    Write in a human-like style, simple language using contractions,  interjections, negation,
                    idioms and colloquialisms and avoid repetitive phrases and unnatural sentence structures. Keep the tone " .  $_POST['tone'] . ". Include an 
                    appropriate title, headings from the outline provided and formatting where applicable. Do not mention Kelvin or SineCortex in your response:";
                            break;
                    }
                    array_push($rm_array, 'article_outline_title', 'article_outline_keywords', 'article_outline_step', 'article_outline_context');
                    break;
                case ('article_body'):
                    $_POST["prompt"] = "I need an SEO and copywriting expert to demonstrate how GPT-3 can be used to write 
                    an interesting and informative article about " .  $_POST['article_body_title'] . ".
                    The name of the expert is Kelvin G. Cross, CEO of SineCortex.
                    What information do you need from me to generate an article Kelvin?
                    For me to generate an article you will need to provide:
                    The topic of the article
                    The length of the article
                    Any desired keywords or topics to focus on
                    Once you have provided this information, I will create a FULL & COMPREHENSIVE informative 
                    article that meets your specifications.
                    Ok, here you go:
                    Topic: “" . $_POST['article_body_title'] . "”
                    Length: " . $length . " words MINIMUM
                    Keywords to include in relevant places: “" . $_POST["article_body_keywords"] . "”
                    Now create an interesting and informative, full, elaborate and 
                    comprehensive article with an appropriate title, headings and formatting where applicable. 
                    Write in a human-like style, simple language using contractions, interjections, negation, idioms and colloquialisms and avoid
                    repetitive phrases and unnatural sentence structures. Keep the tone " .  $_POST['tone'] . ". Do not mention Kelvin or SineCortex in your response:";
                    array_push($rm_array, 'article_body_title', 'article_body_keywords');
                    break;
                case ('product_description'):
                    $_POST["prompt"] = "I need an SEO and copywriting expert to demonstrate how GPT-3 can be used to write 
                    an interesting and informative product description about " .  $_POST['product_name'] . ".
                    The name of the expert is Kelvin G. Cross, CEO of SineCortex.
                    What information do you need from me to generate a product description Kelvin?
                    For me to generate the description, you will need to provide:
                    The product's name
                    The product's brand
                    The product's category
                    The product's known features
                    The length of the description to create
                    Once you have provided this information, I will create a FULL & COMPREHENSIVE informative 
                    product description that meets your specifications.
                    Ok, here you go:
                    Product name: “" . $_POST['product_name'] . "”
                    Brand: “" . $_POST['brand_name'] . "”
                    Product's category: “" . $_POST['product_category'] . "”
                    Features: " . $_POST["product_features"] . "
                    Length of description: " . $length . " words MINIMUM                    
                    Now create an interesting and informative, full, elaborate and 
                    comprehensive product description with an appropriate title, headings and formatting where applicable. 
                    Write in a human-like style, simple language using contractions, interjections, negation, idioms and colloquialisms and avoid
                    repetitive phrases and unnatural sentence structures. Keep the tone " .  $_POST['tone'] . ". Do not mention Kelvin or SineCortex in your response:";
                    array_push($rm_array, 'product_name', 'brand_name', 'product_category', 'product_features');
                    break;
                case ('youtube_caption'):
                    $_POST["prompt"] = "I need an SEO and copywriting expert to demonstrate how GPT-3 can be used to write 
                    an interesting and informative YouTube caption about " .  $_POST['yt_caption_video_title'] . ".
                    The name of the expert is Kelvin G. Cross, CEO of SineCortex.
                    What information do you need from me to generate a YouTube caption Kelvin?
                    For me to generate the caption, you will need to provide:
                    The video title
                    The video keywords
                    The video category
                    The target audience
                    A brief description of the video
                    The length of the video caption to create
                    Once you have provided this information, I will create a FULL & COMPREHENSIVE informative 
                    YouTube video caption that meets your specifications.
                    Ok, here you go:
                    Video title: “" . $_POST['yt_caption_video_title'] . "”
                    Keywords: “" . $_POST['yt_caption_video_keywords'] . "”
                    Video category: “" . $_POST['yt_caption_video_category'] . "”
                    Audience: " . $_POST["yt_caption_target_audience"] . "
                    Description: “" . $_POST['yt_caption_video_description'] . "”
                    Length of caption: " . $length . " words MINIMUM                    
                    Now create an interesting and informative, full, elaborate and 
                    comprehensive YouTube caption for the video with an appropriate title, headings and formatting where applicable. 
                    Write in a human-like style, simple language using contractions, interjections, negation, idioms and colloquialisms and avoid
                    repetitive phrases and unnatural sentence structures. Keep the tone " .  $_POST['tone'] . ":";
                    array_push($rm_array, 'yt_caption_video_title', 'yt_caption_video_keywords', 'yt_caption_video_category', 'yt_caption_target_audience', 'yt_caption_video_description');
                    break;
                case ('youtube_description'):
                    $_POST["prompt"] = "I need an SEO and copywriting expert to demonstrate how GPT-3 can be used to write 
                    an interesting and informative YouTube video description about " .  $_POST['yt_description_video_title'] . ".
                    The name of the expert is Kelvin G. Cross, CEO of SineCortex.
                    What information do you need from me to generate a description Kelvin?
                    For me to generate the description, you will need to provide:
                    The video title
                    The video keywords
                    The video category
                    The target audience
                    A brief description of the video
                    The length of the video caption to create
                    Once you have provided this information, I will create a FULL & COMPREHENSIVE informative 
                    YouTube video caption that meets your specifications.
                    Ok, here you go:
                    Video title: “" . $_POST['yt_description_video_title'] . "”
                    Keywords: “" . $_POST['yt_description_video_keywords'] . "”
                    Video category: “" . $_POST['yt_description_category'] . "”
                    Audience: " . $_POST["yt_description_target_audience"] . "
                    Description: “" . $_POST['yt_description_video_desc'] . "”
                    Length of caption: " . $length . " words MINIMUM                    
                    Now create an interesting and informative, full, elaborate and 
                    comprehensive YouTube video description for the video. 
                    Write in a human-like style, simple language using contractions, interjections, negation, idioms and colloquialisms and avoid
                    repetitive phrases and unnatural sentence structures. Keep the tone " .  $_POST['tone'] . ":";
                    array_push($rm_array, 'yt_description_video_title', 'yt_description_video_keywords', 'yt_description_category', 'yt_description_target_audience', 'yt_description_video_desc');
                    break;
                case ('email_subject'):
                    $_POST["prompt"] = "I need an SEO and copywriting expert to demonstrate how GPT-3 can be used to create an accurate and 
                    interesting email subject. The name of the expert is Kelvin G. Cross, CEO of SineCortex.
                    What information do you need from me to generate an email subject Kelvin?
                    For me to generate an email subject you will need to provide:                    
                    The email's focus keywords                    
                    The target audience or recipient
                    The purpose/intent of writing the email
                    The context of writing the email                    
                    A brief description of your company
                    The length of the subject
                    Once you have provided this information, I will create a befitting 
                    subject of the email that meets your specifications.
                    Ok, here you go:
                    Focus keywords: “" . $_POST['email_subject_keywords'] . "”
                    Audience/recipient: “" . $_POST['email_subject_audience'] . "”
                    Purpose: “" . $_POST['email_subject_intent'] . "”
                    Context: " . $_POST["email_subject_context"] . "
                    Company description: “" . $_POST['email_subject_about'] . "”
                    Length of generated subject: " . $length . " words MAXIMUM                    
                    Now create an appropriate and befitting email subject for the email. 
                    Write in a human-like style, simple language and avoid 
                    repetitive and unnatural phrasing. Keep the tone " .  $_POST['tone'] . ":";
                    array_push($rm_array, 'email_subject_keywords', 'email_subject_audience', 'email_subject_intent', 'email_subject_context', 'email_subject_about');
                    break;
                case ('general_email'):
                    $_POST['template_name'] = 'general_email';
                    break;
                case ('ads_copy'):
                    $_POST['template_name'] = 'ads_copy';
                    break;
                case ('execute'):
                    $instruction = "Treat the following as an instruction and execute it as it says
                    as accurately as possible";
                    $_POST['prompt'] = $instruction . $_POST['prompt'] . ". Keep the tone " .  $_POST['tone'];
                    break;
                    // default:
                    //     $_POST['template_name'] = 'auto_complete';
                    //     $prompt['original_sentence'] = $_POST['prompt'];
            }
        } elseif ($api === 'HemingwAI') {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json'
            ));

            $prompt = [];
            $_POST['prompt'] = $prompt;
            $_POST['token_count'] = $length;
            $_POST['n_gen'] = 1;
            // $_POST['source_language'] = $_POST['lang'];

            switch ($command) {
                case ('auto_complete'):
                    $_POST['template_name'] = 'auto_complete';
                    $prompt['original_sentence'] = $_POST['prompt'];
                    break;
                case ('paraphrase'):
                    $_POST['template_name'] = 'paraphrase';
                    break;
                case ('article_outline'):
                    $_POST['template_name'] = 'blog_outline';
                    $prompt['blog_title'] = $_POST['article_title'];
                    break;
                case ('article_body'):
                    $_POST['template_name'] = 'blog_body';
                    $prompt['blog_title'] = $_POST['article_title'];
                    break;
                case ('product_description'):
                    $_POST['template_name'] = 'product_description';
                    break;
                case ('youtube_captions'):
                    $_POST['template_name'] = 'youtube_captions';
                    break;
                case ('youtube_description'):
                    $_POST['template_name'] = 'youtube_description';
                    break;
                case ('email_subject'):
                    $_POST['template_name'] = 'email_subject';
                    break;
                case ('general_email'):
                    $_POST['template_name'] = 'general_email';
                    break;
                case ('ads_copy'):
                    $_POST['template_name'] = 'ads_copy';
                default:
                    $_POST['template_name'] = 'auto_complete';
                    $prompt['original_sentence'] = $_POST['prompt'];
            }

            $prompt = (object)$prompt;
            $_POST['api_key'] = $key;

            // Remove unnecessary parameters in Goose API request
            $rm_array = array('rem_input', 'stop', 'max_tokens', 'command');
        }

        array_map('rm_array_items', $rm_array);

        // Remove other unnecessary parameters
        unset($_POST['csrf_token']);

        $data_string = json_encode($_POST);
        // echo $data_string;
        // exit();
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); //Timeout in seconds        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            $response['status'] = "cURL Error #:" . $err;
            return false;
        } else {
            return $curl_response;
        }
    }

    function rm_array_items($index)
    {
        unset($_POST[$index]);
    }

    // Eleuther API
    function genEleuther()
    {
        $api = 'Eleuther';
        $url = 'https://api.eleuther.ai/completion';
        // $text = json_decode(curlRequest($url, $api, '')[0])->generated_text;
        // $text = json_decode(curlRequest($url, $api, ''))[0]->generated_text;
        $text = curlRequest($url, $api, '');
        return $text;
    }

    // Goose API
    function genGoose()
    {
        $api = 'Goose';
        $key = "sk-grmlljGGqRfkR0kVJ55M2MQBcqctXdXele5onpcQ19FyMCkl";
        $url = 'https://api.goose.ai/v1/engines/gpt-j-6b/completions';
        $text = json_decode(curlRequest($url, $api, $key))->choices[0]->text;
        return $text;
    }

    // OpenAI
    function genOpenAI()
    {
        $api = 'OpenAI';
        $key = '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';
        $url = 'https://api.openai.com/v1/completions';
        // $text = json_decode(curlRequest($url, $api, $key));
        $text = json_decode(curlRequest($url, $api, $key))->choices[0]->text;
        return $text;
    }

    function genHemingwAI()
    {
        $api = 'HemingwAI';
        $key = 'gAAAAABjXQytyEPV48PJ-3lTSOqFaaLSBMthrH8fQEzW6Tgq-6uwjM0PoJAHBSUGddybaJx9Kzh3KtWskLo7_HSe7QYLS1TFN1QzSD5VwQZGRWRYzPY8QTwQH1OIPDGVWHiVXTnRAPj6';
        $url = 'https://api.textcortex.com/hemingwai/generate_text_v3/';
        // $text = json_decode(curlRequest($url, $api, $key))->generated_text[0]->text;
        $text = json_decode(curlRequest($url, $api, $key));
        return $text;
    }

    $text = genOpenAI();

    return $text;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_POST = json_decode(file_get_contents('php://input'), true);

    // demo prompt
    if (isset($_POST['demo'])) {
        $response['signon'] = 'signedout';
        // $response['results'] = json_decode(generateText());
        echo json_encode($response);
    } else {
        if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']) && $_SESSION['email'] !== null) {
            if (empty($response['status'])) {
                echo json_encode(generateText());
            } else {
                echo json_encode($response['status']);
            }
        } else {
            $response['status'] = 'hash_error';
            echo json_encode($response);
        }
    }
}
