<?php

// error_reporting(0);

include "../../session.php";

@ini_set('zlib.output_compression', 0);

ob_implicit_flush(true);
ob_end_flush();

// Set content type and cache control headers
header("Content-Type: text/event-stream");
header("Cache-Control: no-cache");

// create variables from array elements
extract($_SESSION);

function rm_array_items($index)
{
    global $_SESSION;
    unset($_SESSION[$index]);
}

$key = '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';
$url = 'https://api.openai.com/v1/completions';

$command = $_SESSION['command'];

// Set important params
$_SESSION['model'] = 'text-davinci-003';
$_SESSION["stream"] = true;
$_SESSION["max_tokens"] = $_SESSION["word_count"];
$_SESSION["presence_penalty"] = 0.5;
$_SESSION["frequency_penalty"] = 0.5;

//Type cast necessary numerical params
$_SESSION['temperature'] = (float) $_SESSION['creativity'];

$length = (int) $_SESSION['max_tokens'];

$length = ceil($length);

if ($length == 0)
    $length = 2;
$_SESSION['max_tokens'] = $length;

// Remove other unnecessary parameters in request           
$rm_array = array('loggedin', 'id', 'username', 'email', 'csrf_token', 'command', 'rem_input', 'word_count', 'creativity');

/**
 * Prompt building
 */

switch ($command) {
        // case ('auto_complete'):
        //     $_SESSION['template_name'] = 'auto_complete';
        //     break;
    case ('paraphrase'):
        $_SESSION["prompt"] = "I need an SEO and copywriting expert to demonstrate how GPT-3 can be used to 
        paraphrase or rewrite content in an accurate way
        The name of the expert is Kelvin G. Cross, CEO of SineCortex.
        What information do you need from me to rewrite the content without losing meaning Kelvin?
        For me to paraphrase the content, you will need to provide:
        The content to be rewritten
        Once you have provided this content, I will rewrite it accurately using as few words in the suppliead
        content without losing meaning.
        Ok, here you go:
        Content to paraphrase: “" . $_SESSION['prompt'] . "”                                    
        Now rewrite the content as accurately as possible and keep the tone " .  $_SESSION['tone'] . ":";
        array_push($rm_array, 'article_body_title', 'article_body_keywords');
        break;
    case ('article_outline'):
        // exit;
        $step = $_SESSION['article_outline_step'];
        switch ($step) {
            case 1:
                $_SESSION["prompt"] = "I need an SEO and copywriting expert to demonstrate how GPT-3 can be used to write 
        an interesting and informative article outline about " .  $_SESSION['article_outline_title'] . ".
        The name of the expert is Kelvin G. Cross, CEO of SineCortex.
        What information do you need from me to generate an article outline Kelvin?
        For me to generate an article outline, you will need to provide:
        The topic of the article
        Any desired keywords or topics to focus on
        Once you have provided this information, I will create a befitting article outline                     
        that meets your specifications for you to approve.
        Ok, here you go:
        Topic: “" . $_SESSION['article_outline_title'] . "”
        Length: 100 words MAXIMUM
        Keywords to include in relevant places: “" . $_SESSION["article_outline_keywords"] . "”
        Now create a superb 7 paragraph article outline and keep the tone " .  $_SESSION['tone'] . ":";
                break;
            case 2:
                $_SESSION["prompt"] = "I need an SEO and copywriting expert to demonstrate how GPT-3 can be used to write 
        an interesting and informative article about " .  $_SESSION['article_outline_title'] . ".
        The name of the expert is Kelvin G. Cross, CEO of SineCortex.
        What information do you need from me to generate an article Kelvin?
        For me to generate an article you will need to provide:
        The topic of the article
        The length of the article
        Any desired keywords or topics to focus on
        Once you have provided this information, I will create a FULL & COMPREHENSIVE informative 
        article that meets your specifications.
        Ok, here you go:
        Topic: “" . $_SESSION['article_outline_title'] . "”
        Length: " . $length . " words MINIMUM
        Keywords to include in relevant places: “" . $_SESSION["article_outline_keywords"] . "”
        Now create an interesting and informative, full, elaborate and 
        comprehensive article using the following paragraph outline: " . $_SESSION["article_outline_context"] . ".
        Incorporate human-like language and style:
        Use contractions. Instead of writing “do not” or “cannot”, use contractions like “don’t” and “can’t”.
        Use idioms and colloquialisms. Instead of using formal or technical language, try incorporating idioms and colloquialisms into to make
        content sound more authentic and relatable.
        Avoid repeating the same words and phrases, and use a variety of sentence structures.
        Use interjections to express a sudden burst of emotion or feeling. Some of these examples include: Uh-Oh!, Yikes!, Gee!, Phew!, Heaven Forbid! And more!
        Make mistakes with run-on sentences and improper punctuation or grammar.
        Use transitional phrasing to move from one thought to another more succinctly.        
        Keep the tone " .  $_SESSION['tone'] . ". Include an 
        appropriate title, headings from the outline provided and formatting where applicable. Do not mention Kelvin or SineCortex in your response:";
                break;
        }
        array_push($rm_array, 'article_outline_title', 'article_outline_keywords', 'article_outline_step', 'article_outline_context');
        break;
    case ('article_body'):
        $_SESSION["prompt"] = "I need an SEO and copywriting expert to demonstrate how GPT-3 can be used to write 
        an interesting and informative article about " .  $_SESSION['article_body_title'] . ".
        The name of the expert is Kelvin G. Cross, CEO of SineCortex.
        What information do you need from me to generate an article Kelvin?
        For me to generate an article you will need to provide:
        The topic of the article
        The length of the article
        Any desired keywords or topics to focus on
        Once you have provided this information, I will create a FULL & COMPREHENSIVE informative 
        article that meets your specifications.
        Ok, here you go:
        Topic: “" . $_SESSION['article_body_title'] . "”
        Length: " . $length . " words MINIMUM
        Keywords to include in relevant places: “" . $_SESSION["article_body_keywords"] . "”
        Now create an interesting and informative, full, elaborate and 
        comprehensive article with an appropriate title, headings and formatting where applicable. 
        Incorporate human-like language and style:
        Use contractions. Instead of writing “do not” or “cannot”, use contractions like “don’t” and “can’t”.
        Use idioms and colloquialisms. Instead of using formal or technical language, try incorporating idioms and colloquialisms into to make
        content sound more authentic and relatable.
        Avoid repeating the same words and phrases, and use a variety of sentence structures.
        Use interjections to express a sudden burst of emotion or feeling. Some of these examples include: Uh-Oh!, Yikes!, Gee!, Phew!, Heaven Forbid! And more!
        Make mistakes with run-on sentences and improper punctuation or grammar.
        Use transitional phrasing to move from one thought to another more succinctly. 
        Keep the tone " .  $_SESSION['tone'] . ". Do not mention Kelvin or SineCortex in your response:";
        array_push($rm_array, 'article_body_title', 'article_body_keywords');
        break;
    case ('product_description'):
        $_SESSION["prompt"] = "I need an SEO and copywriting expert to demonstrate how GPT-3 can be used to write 
        an interesting and informative product description about " .  $_SESSION['product_name'] . ".
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
        Product name: “" . $_SESSION['product_name'] . "”
        Brand: “" . $_SESSION['brand_name'] . "”
        Product's category: “" . $_SESSION['product_category'] . "”
        Features: " . $_SESSION["product_features"] . "
        Length of description: " . $length . " words MINIMUM                    
        Now create an interesting and informative, full, elaborate and 
        comprehensive product description with an appropriate title, headings and formatting where applicable. 
        Incorporate human-like language and style:
        Use contractions. Instead of writing “do not” or “cannot”, use contractions like “don’t” and “can’t”.
        Use idioms and colloquialisms. Instead of using formal or technical language, try incorporating idioms and colloquialisms into to make
        content sound more authentic and relatable.
        Avoid repeating the same words and phrases, and use a variety of sentence structures.
        Use interjections to express a sudden burst of emotion or feeling. Some of these examples include: Uh-Oh!, Yikes!, Gee!, Phew!, Heaven Forbid! And more!
        Make mistakes with run-on sentences and improper punctuation or grammar.
        Use transitional phrasing to move from one thought to another more succinctly.
        Keep the tone " .  $_SESSION['tone'] . ". Do not mention Kelvin or SineCortex in your response:";
        array_push($rm_array, 'product_name', 'brand_name', 'product_category', 'product_features');
        break;
    case ('youtube_caption'):
        $_SESSION["prompt"] = "I need an SEO and copywriting expert to demonstrate how GPT-3 can be used to write 
        an interesting and informative YouTube caption about " .  $_SESSION['yt_caption_video_title'] . ".
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
        Video title: “" . $_SESSION['yt_caption_video_title'] . "”
        Keywords: “" . $_SESSION['yt_caption_video_keywords'] . "”
        Video category: “" . $_SESSION['yt_caption_video_category'] . "”
        Audience: " . $_SESSION["yt_caption_target_audience"] . "
        Description: “" . $_SESSION['yt_caption_video_description'] . "”
        Length of caption: " . $length . " words MINIMUM                    
        Now create an interesting and informative, full, elaborate and 
        comprehensive YouTube caption for the video with an appropriate title, headings and formatting where applicable. 
        Incorporate human-like language and style:
        Use contractions. Instead of writing “do not” or “cannot”, use contractions like “don’t” and “can’t”.
        Use idioms and colloquialisms. Instead of using formal or technical language, try incorporating idioms and colloquialisms into to make
        content sound more authentic and relatable.
        Avoid repeating the same words and phrases, and use a variety of sentence structures.
        Use interjections to express a sudden burst of emotion or feeling. Some of these examples include: Uh-Oh!, Yikes!, Gee!, Phew!, Heaven Forbid! And more!
        Make mistakes with run-on sentences and improper punctuation or grammar.
        Use transitional phrasing to move from one thought to another more succinctly.
        Keep the tone " .  $_SESSION['tone'] . ". Do not mention Kelvin or SineCortex in your response:";
        array_push($rm_array, 'yt_caption_video_title', 'yt_caption_video_keywords', 'yt_caption_video_category', 'yt_caption_target_audience', 'yt_caption_video_description');
        break;
    case ('youtube_description'):
        $_SESSION["prompt"] = "I need an SEO and copywriting expert to demonstrate how GPT-3 can be used to write 
        an interesting and informative YouTube video description about " .  $_SESSION['yt_description_video_title'] . ".
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
        Video title: “" . $_SESSION['yt_description_video_title'] . "”
        Keywords: “" . $_SESSION['yt_description_video_keywords'] . "”
        Video category: “" . $_SESSION['yt_description_category'] . "”
        Audience: " . $_SESSION["yt_description_target_audience"] . "
        Description: “" . $_SESSION['yt_description_video_desc'] . "”
        Length of caption: " . $length . " words MINIMUM                    
        Now create an interesting and informative, full, elaborate and 
        comprehensive YouTube video description for the video. 
        Incorporate human-like language and style:
        Use contractions. Instead of writing “do not” or “cannot”, use contractions like “don’t” and “can’t”.
        Use idioms and colloquialisms. Instead of using formal or technical language, try incorporating idioms and colloquialisms into to make
        content sound more authentic and relatable.
        Avoid repeating the same words and phrases, and use a variety of sentence structures.
        Use interjections to express a sudden burst of emotion or feeling. Some of these examples include: Uh-Oh!, Yikes!, Gee!, Phew!, Heaven Forbid! And more!
        Make mistakes with run-on sentences and improper punctuation or grammar.
        Use transitional phrasing to move from one thought to another more succinctly.
        Keep the tone " .  $_SESSION['tone'] . ". Do not mention Kelvin or SineCortex in your response:";
        array_push($rm_array, 'yt_description_video_title', 'yt_description_video_keywords', 'yt_description_category', 'yt_description_target_audience', 'yt_description_video_desc');
        break;
    case ('email_subject'):
        $_SESSION["prompt"] = "I need an SEO and copywriting expert to demonstrate how GPT-3 can be used to create an accurate and 
        interesting email subject. The name of the expert is Kelvin G. Cross, CEO of SineCortex.
        What information do you need from me to generate an email subject Kelvin?
        For me to generate an email subject you will need to provide:                    
        The email's focus keywords                    
        The target audience/recipient
        The purpose/intent of writing the email
        The context of writing the email                    
        A brief description of you or your company
        The length of the subject
        Once you have provided this information, I will create a befitting 
        subject of the email that meets your specifications.
        Ok, here you go:
        Focus keywords: “" . $_SESSION['email_subject_keywords'] . "”
        Audience/recipient: “" . $_SESSION['email_subject_audience'] . "”
        Purpose: “" . $_SESSION['email_subject_intent'] . "”
        Context: " . $_SESSION["email_subject_context"] . "
        About me/my company: “" . $_SESSION['email_subject_about'] . "”
        Length of email subject: " . $length . " words MAXIMUM                    
        Now create an appropriate and befitting email subject for the email. 
        Write in a human-like style, simple language and avoid repetitive and unnatural phrasing.
        Keep the tone " .  $_SESSION['tone'] . ". Do not mention Kelvin or SineCortex in your response:";
        array_push($rm_array, 'email_subject_keywords', 'email_subject_audience', 'email_subject_intent', 'email_subject_context', 'email_subject_about');
        break;
    case ('email_body'):
        $_SESSION["prompt"] = "I need a writing expert to demonstrate how GPT-3 can be used to create an accurate and 
        interesting email body. The name of the expert is Kelvin G. Cross, CEO of SineCortex.
        What information do you need from me to generate an email body Kelvin?
        For me to generate an email body you will need to provide:    
        Sender's name          
        Recipient's name   
        The email subject
        The email's focus keywords                                
        A description of the audience/recipient
        The purpose/intent of writing the email
        The context of writing the email                    
        A brief description of you or your company
        The length of the email body to write
        Once you have provided this information, I will create a befitting 
        email body that meets your specifications.
        Ok, here you go:
        Email sender: " . $_SESSION["email_body_from"] . "
        Email recipient: " . $_SESSION["email_body_to"] . "
        Email subject: " . $_SESSION["email_body_subject"] . "
        Email focus keywords: “" . $_SESSION['email_body_keywords'] . "”
        Audience/recipient description: “" . $_SESSION['email_body_audience'] . "”
        Purpose: “" . $_SESSION['email_body_intent'] . "”
        Context: " . $_SESSION["email_body_context"] . "
        About me/my company: “" . $_SESSION['email_body_about'] . "”
        Length of email body: " . $length . " words MINIMUM                    
        Now create an appropriate and befitting email body. 
        Write in a human-like style, simple language and avoid repetitive and unnatural phrasing.
        Keep the tone " .  $_SESSION['tone'] . ". Do not mention Kelvin or SineCortex in your response:";
        array_push($rm_array, 'email_body_from', 'email_body_to', 'email_body_subject', 'email_body_keywords', 'email_body_audience', 'email_body_intent', 'email_body_context', 'email_body_about');
        break;
    case ('ad_copy'):
        $_SESSION["prompt"] = "I need a copywriting expert to demonstrate how GPT-3 can be used to create an accurate and 
        interesting ad. The name of the expert is Kelvin G. Cross, CEO of SineCortex.
        What information do you need from me to generate an ad Kelvin?
        For me to generate the ad copy you will need to provide:                    
        The name of the product or service being promoted
        A brief description of the product or service being promoted
        The target audience of the ad
        Context about campaign/promotion 
        Ad keywords                        
        The length of the ad copy created
        Once you have provided this information, I will create a befitting 
        ad that meets your specifications.
        Ok, here you go:
        Product/service name: “" . $_SESSION['ad_product_name'] . "”
        Description: “" . $_SESSION['ad_description'] . "”
        Audience: " . $_SESSION["ad_target_audience"] . "
        Campaign/promotion context: “" . $_SESSION['ad_context'] . "”        
        Ad keywords to include: “" . $_SESSION['ad_keywords'] . "”
        Length of ad copy: " . $length . " words MAXIMUM                    
        Now create an appropriate and befitting ad. 
        Write creatively and in a human-like style and avoid repetitive and unnatural phrasing.
        Keep the tone " .  $_SESSION['tone'] . ". Do not mention Kelvin or SineCortex in your response:";
        array_push($rm_array, 'ad_product_name', 'ad_description', 'ad_target_audience', 'ad_context', 'ad_keywords');
        break;
    case ('execute'):
        $instruction = "Treat the following as an instruction and execute it as it says
        as accurately as possible";
        $_SESSION['prompt'] = $instruction . $_SESSION['prompt'] . ". Keep the tone " .  $_SESSION['tone'];
        break;
        // default:
        //     $_SESSION['template_name'] = 'auto_complete';
        //     $prompt['original_sentence'] = $_SESSION['prompt'];
}


// Remove other unnecessary parameters            
array_push($rm_array, 'tone');
array_map('rm_array_items', $rm_array);

$data_string = json_encode($_SESSION);
// var_dump($data_string);
// exit();

// Run only once
for ($i = 0; $i < 1; $i++) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "Authorization: Bearer " . $key
    ));
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); //Timeout in seconds        
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($curl, CURLOPT_WRITEFUNCTION, function ($curl, $data) {
        echo $data;
        return strlen($data);
    });

    $curl_response = curl_exec($curl);
    $err = curl_error($curl);

    if (connection_aborted()) break;
    curl_close($curl);

    // Check for cURL error
    if ($err)
        echo "cURL Error: " . $err;

    echo $curl_response;
}

$sess_data = array(
    'loggedin' => $loggedin,
    'csrf_token' => $csrf_token,
    'id' => $id,
    'username' => $username,
    'email' => $email
);

foreach ($sess_data as $key => $value) {
    $_SESSION[$key] = $value;
}
