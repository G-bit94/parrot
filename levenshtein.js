//  Levenshtein Distance
String.prototype.LevenshteinDistance = function (s2) {
    var array = new Array(this.length + 1);
    for (var i = 0; i < this.length + 1; i++)
        array[i] = new Array(s2.length + 1);

    for (var i = 0; i < this.length + 1; i++)
        array[i][0] = i;
    for (var j = 0; j < s2.length + 1; j++)
        array[0][j] = j;

    for (var i = 1; i < this.length + 1; i++) {
        for (var j = 1; j < s2.length + 1; j++) {
            if (this[i - 1] == s2[j - 1]) array[i][j] = array[i - 1][j - 1];
            else {
                array[i][j] = Math.min(array[i][j - 1] + 1, array[i - 1][j] + 1);
                array[i][j] = Math.min(array[i][j], array[i - 1][j - 1] + 1);
            }
        }
    }
    return array[this.length][s2.length];
};

function string_similarity(s1, s2) {
    var longer = s1;
    var shorter = s2;
    if (s1.length < s2.length) {
        longer = s2;
        shorter = s1;
    }
    var longerLength = longer.length;
    if (longerLength == 0) {
        return 1.0;
    }
    return (longerLength - longer.LevenshteinDistance(shorter)) / longerLength;
}


var strings = [
    'Blog post article',
    'Outline',
    'Paraphrase rewrite',
    'Email',
    'Instagram description'
];

var str_templates = [
    'article_body',
    'article_outline',
    'paraphrase',
    'email_body',
    'instagram_caption'
];

/**
 * Return the case with the highest similarity to the subject string
 * Loop through strings array and return template of string with highest similarity
 */

function get_template_context(subject) {

    subject = subject.toLowerCase();

    // Get template                            
    var sims = [];

    // Loop
    for (var i in strings) {
        var s = strings[i].toLowerCase();

        // String index in templates array
        var string_index = strings.indexOf(s);

        // Similarity to subject
        var sim = string_similarity(s, subject);

        // Push similarity to similarities array                                   
        sims.push(Math.round(sim * 100));

    }

    /**
     * Get string template with highest similarity.
     * Default 20: seems somewhat arbitrary but there's
     * only a 1/5 chance of selecting any one template 
     * if done randomly.
     */

    const highest_sim = Math.max(...sims);

    console.log(highest_sim)

    str_index = sims.indexOf(highest_sim);

    // Since templates index = strings index
    tmplte = str_templates[str_index];

    if (highest_sim >= 20) {
        tmplte = 'auto_complete';
    }

    // Get context

    str_search = x.selectedText;
    str_search = str_search.toLowerCase();
    str_search = str_search.replace(/write/i, '');
    str_search = str_search.replace(/ on /i, ' ');
    str_search = str_search.replace(/ a /i, ' ');

    space_index = str_search.indexOf(' ');

    // Replace the space at the beginning (hacky, I know)
    str_search = str_search.split('');
    str_search[space_index] = '';
    str_search = str_search.join('');

    str_remove = strings[str_index].toLowerCase();

    strs_arr = str_remove.split(" ")
    cntxt = str_search;
    for (i = 0; i < strs_arr.length; i++) {
        cntxt = cntxt.replace(strs_arr[i], '');
    }

    cntxt_words_arr = cntxt.split(" ");

    if (cntxt_words_arr.length > 1 && tmplte == "article_body") {

        sendInfo.article_body_keywords = cntxt_words_arr;

    }

    return {
        template: tmplte,
        context: cntxt
    };
}

var result_obj = get_template_context(x.selectedText);
command = result_obj.template;
context = result_obj.context;