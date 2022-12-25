<?php

/**
 * OpenAI API RESPONSE SIMULATOR
 */

header("Cache-Control: no-store");
header("Content-Type: text/event-stream");

$counter = rand(1, 10);
while (true) {
    // Every second, send a "message" event.

    echo "event: message\n";
    echo 'data: {
                "id": "cmpl-6QVwsoSogGcnbHa0O7mBACi54WkNW", 
                "object": "text_completion", 
                "created": 1671777358, 
                "choices": [{
                                "text": "\n", 
                                "index": 0, 
                                "logprobs": null, 
                                "finish_reason": null
                            }], 
                "model": "text-davinci-003"
               }';
    echo "\n\n";

    // Send a simple message at random intervals.

    // $counter--;

    // if (!$counter) {
    //     echo 'data: {
    //             "id": "cmp2-jQQVwKladsygcsnva0O7mBACi54Wklp", 
    //             "object": "text_completion", 
    //             "created": 1671777358, 
    //             "choices": [{
    //                             "text": "\n", 
    //                             "index": 0, 
    //                             "logprobs": null, 
    //                             "finish_reason": null
    //                         }], 
    //             "model": "text-davinci-003"
    //            }' . "\n\n";
    //     $counter = rand(1, 10);
    // }

    ob_end_flush();
    flush();

    // Break the loop if the client aborted the connection (closed the page)

    if (connection_aborted()) break;

    sleep(2);
}
