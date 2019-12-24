<?php

/**
 * reviveString calculates all unique possible substrings of the given string $string,
 * sorts them lexigraphically (for a string 'abc': 'a', 'ab', 'abc', 'b', 'bc', ...),
 * concatenates all substrings and returns the $k-th letter (1-indexed).
 *
 * @param string str The string to be checked
 * @param int    k   The 1-indexed letter to be returned
 *
 * @return string The letter at the $k-th position
 */

reviveString( 'dbac', 3 );

function reviveString(string $string, int $k): string {
    // code here
    $arrStrings     = [];   // This will hold all strings possible
    $stringSize     = strlen( $string );
    $stringReturn   = '';


    // Go through the string
    for( $i = 0; $i < $stringSize; $i++ ) {
        $newString  = $string[$i];
        // Avoid repetead strings
        if( ! in_array( $newString, $arrStrings ) )
        {
            array_push( $arrStrings, $newString );
        }
        // Get the remaining part of the string
        for( $j = ($i + 1); $j < $stringSize; $j++ ) {
            $newString  .= $string[$j];
            // Avoid repetead strings
            if( ! in_array( $newString, $arrStrings ) )
            {
                array_push($arrStrings, $newString);
            }
        }
    }

    // sorts lexigraphically the array
    sort( $arrStrings );
    $stringReturn   = implode('', $arrStrings );
    $stringReturn   = $stringReturn[$k-1];

    //echo '<pre>'; print_r(  $stringReturn ); echo '</pre>';
    //echo '<pre>'; print_r(  $arrStrings  ); echo '</pre><br />';

    return $stringReturn;
}

// When done or for testing, uncomment the following if-statement:
if(valid()) {
     echo('All tests successful!');
}


// 888888888888  88888888888  ad88888ba  888888888888  ad88888ba
//      88       88          d8"     "8b      88      d8"     "8b
//      88       88          Y8,              88      Y8,
//      88       88aaaaa     `Y8aaaaa,        88      `Y8aaaaa,
//      88       88"""""       `"""""8b,      88        `"""""8b,
//      88       88                  `8b      88              `8b
//      88       88          Y8a     a8P      88      Y8a     a8P
//      88       88888888888  "Y88888P"       88       "Y88888P"

function valid() {
    return assert('c' === reviveString("dbac", 3))&&
        assert('c' === reviveString("abc", 6))&& // concatenated substrings: a ab abc b bc c
        assert('c' === reviveString("dbacssxsa", 3)) && // concatenated substrings: aacbbabaccddbdbadbac
        assert('o' === reviveString("lsedzyxvoigntpeyyzgbptllxcdqvupimvlnuiiktpxmedmefsguorhltmbqgszuqmikvquoftclyoqdjyzxpjklvmbcgcwwpeimxcaexeqysibdgdavmlgjzklfmkedqmpnrrsqvkoqsstyvuvjhesgqgncqtgigxwzpqpkagasywsvqpezvyfleuqwoyfwvdxktoxtuznuvhpnyvmuutfaqxxgveerhbdcrcvockiztanrvbl", 6091)) &&
        assert('s' === reviveString("tupqtvoxbhgckivnfjrrsqkufbphpjgkdvcysqxtxdvknszscqjwgtqmwfvnqbxvyatqsqjsvgciydaatlybgopfwksmnqklsddmwmersiatlcvgquiyizdgkwtzofngkqsgfxazhcsteqbwkjvulybvuwwibjqlcjuhiuirwbmctozdzwzkuchraebbpsptdjcnfleborfhhgmgcnrzqysqetuunjnsushbdoerfjaosmuuzlvrmniqjckynarjuamxoqqvbqjtceqdrlvdzfukjgiyibjccvzqlpmmhvilbyptjmwktquczfahgjkkglbrdpfkmnwolnhvbfhuycwxjyepjqapcdgfunrgdnwocfldltxjxvggtmxcdzrhezoynfhqvdgxjudunafmwnurbtuevnnznbacjhuekadvugrjjwxhjryllurgihhvkhztqtxdtbyqhqbqozxaqyndsglanvxyewrvprylsybbqcsfbrfupuzkalkoiiomehhuyhfqiiuymodofkkxejhhwtxgbltgscctkjlurfsdtytbkdarpjyncvueinmcpovbxhvqoqtionlyslpjupxyktesiqxzgsdfbyvqqraeglfyywkumhsycxtkpqlwiodmpbcfscmyptynpijdrdctaxfsnrqxhtjwuneopqoglnvaxeepiikkfsculsrsodrkqvbinpoyemacqgtaqfnxxrrimldaoumgrnogffgjrgnjpgmfozdlswuehzgvttcmissnxyzqgmcxvodjpiuheqmmpujknnwygqlfokwxzauuozffhbmouaclvlwkbuihlwobimyhmvdcuihemusgwurthpgimqrxmgavubehwijsstwgnqmlmgfuxneldwkqelnymthkdtcwmbebrrmeztaygekkcucifrjtkqdolimzjqacjpikkijtpvftphcxalqmdwareoqphrrsiadsi", 216706))&&
        assert('a' === reviveString("zjstazvxbioolkqcqhtfomwiwwnohdcgmubnwwmxeansmewelrjbfilbgzspcuyrqzgoysocvbwjhvoumzxsjjvqinfmjfdaflqdeehbigkpbaknahhjsdbaqjpaouctgsykxinfoxwpyieaqmlirplhyajmunicgiofqbmezkvztabloovfdgobiaqfnahvkwcbxqhybdzudafrpaysjmwtmoyaoixag", 23673))&&
        assert('h' === reviveString("fqjgrofntgukxvkrgwnzldantikuqkvvdgbwwjkppeboblfhivjvyjistsmjfjgiqkemtqeixfyyrdibyrwxaeptydedmkleustnkxxhcvivzqwzhuwjanezqicfuqjpicesbccexkzyayyjuwuvkauciwhemttwvyrxctdbfeahcaqzwmuimolwkuaznwvluoiwjnxorzvwznvwzpgnfrjrokqbgomcewaolzcdbybalyynpfauymlmyeqgsciwbkmmlprmpuncsnphusbtgphetxknculfgytrpleeftgyiyhdsjwyyfetdqghmtmsrflispmakvatvhwnqunqztjejrnvnzpehanbsbbcwbvrltgdpvurofvxzjumkjstkhvclyghcebnxjqnfmgvubvtmphzbzsljppuqvdubghzqzoxouuixpdmhklilfvuxmqnhuhjcqkurarfwonvdshkcuuqapmzbdmlz", 67548))&&
        assert('u' === reviveString("bniwgkpmgdbbjulvyfqoffbejeswfpsiecelmwzsbavkwggvowjtdkaoqukxmegsgmfskemmhiwdqcaeakaewcupwfmkjufshkkrrxfyhcdxgechqcnoehdcospamusvgcpzbuziydgfjimbmbpsivwznlzbhrzqvqpxmpflulqfvegjfxbpsaqhlpjvikneaebmtixpupurtcbaaesseiasalpivcmxgpjcyjruyoluqowqvolzzntzyijvmysvndznmqhngvhxjdneuagvnzunkfiydcttisgulohrjqquwgbqghluihhumstsumlchrzuhilqzenvkonqxamhhwcvoxpklapsuombyauxgjuqzjiwjvfsrjohgfruggmcwbfvdzujkrzjajhmgnexyughaybigpkdqpavruebnflqpscvhgvgdbndbolidxnwonrfjyjxdwpuqrsyxngcqvfulscqprmegglpeuojqdghwyhwnpydkexvwblouasagfqmagxsmdbibkeqzdwjhvefxstrsnuavkoxslpertnuftlfwhqfcxnbpivjwpjtbxqtkhabapwgijnhqdmuabwrktaiilbjkrexyeybvwjefwlvbzsebovlhytrjucwngtlntmiqxoxtbvvbnbebwpkwkbigfetlzgasvlksz", 166098));
}
