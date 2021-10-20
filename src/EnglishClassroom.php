<?php
function run(bool $morseToEnglish, string $textToTranslate): ?string
{
    /*
    * Write your code below; return type and arguments should be according to the problem\'s requirements
    */

    // Converts Morse code to English text and English text to Morse code

    // As a rule, for every Morse sentence,
    // we should consider a space between morse letters,
    // and three spaces between morse words
    // (also two spaces in english are equivalent to six spaces in morse ).

    // If the morse code that is going to be translated is not valid or the spacing is not correct,
    // you should output 'Invalid Morse Code Or Spacing'

    // CONSTRAINTS
    // 0 < nrCharacters <= 100 000

    $translatedText = null;

    $length = strlen($textToTranslate);

    if (($length > 0) and ($length <= 100000)) {
    // Set up Morse Code Array
        $morse_codes = [
            ".-" => "a",
            "-..." => "b",
            "-.-." => "c",
            "-.." => "d",
            "." => "e",
            "..-." => "f",
            "--." => "g",
            "...." => "h",
            ".." => "i",
            ".---" => "j",
            "-.-" => "k",
            ".-.." => "l",
            "--" => "m",
            "-." => "n",
            "---" => "o",
            ".--." => "p",
            "--.-" => "q",
            ".-." => "r",
            "..." => "s",
            "-" => "t",
            "..-" => "u",
            "...-" => "v",
            ".--" => "w",
            "-..-" => "x",
            "-.--" => "y",
            "--.." => "z",
            "-----" => "0",
            ".----" => "1",
            "..---" => "2",
            "...--" => "3",
            "....-" => "4",
            "....." => "5",
            "-...." => "6",
            "--..." => "7",
            "---.." => "8",
            "----." => "9",
            ".-.-.-" => ".",
            "--..--" => ",",
            "..--.." => "?",
        ];

        if ($morseToEnglish) {
            // Translate morse code to English

            // Split the morse code into English words first
            $morse_words = explode("   ", $textToTranslate);

            $number_of_words = count($morse_words);

            // Process each morse word
            for ($i = 0; $i < $number_of_words; $i++) {
                // Split the morse word into letters
                $morse_letters = explode(" ", $morse_words[$i]);

                foreach ($morse_letters as $morse_letter) {
                    if (array_key_exists($morse_letter, $morse_codes)) {
                        // Ensure that the morse code letter is valid
                        $translatedText .= $morse_codes[$morse_letter];
                    } else {
                        // No such array key in morse codes, return error message
                        return 'Invalid Morse Code Or Spacing';
                    }
                }

                // Add word space
                $translatedText .= ' ';
            }

            // Trim the output to get rid of the last space
            $translatedText = trim($translatedText);
        } else {
            // Translate English to morse code

            // Flip the morse codes array
            $morse_codes = array_flip($morse_codes);

            // Process each letter in the input string
            for ($i = 0; $i < $length; $i++) {
                $eng_letter = strtolower($textToTranslate[$i]);

                if ($eng_letter == ' ') {
                    // Add word space
                    $translatedText .= '   ';
                } else {
                    // Translate the English letter to morse code
                    $translatedText .= $morse_codes[$eng_letter];

                    // If the next character is a word space then there is no need to add letter space
                    // Only do this if it is NOT the final English letter
                    $next_index = $i + 1;
                    if (($next_index != $length) and ($textToTranslate[$next_index] != ' ')) {
                        // Add letter space
                        $translatedText .= ' ';
                    }
                }
            }
        }

        return $translatedText;
    } else {
        // Invalid input string length
        return 'Invalid Morse Code Or Spacing';
    }
}
