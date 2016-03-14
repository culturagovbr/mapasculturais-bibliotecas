<?php
$app = MapasCulturais\App::i();
$em = $app->em;
$conn = $em->getConnection();


/**
 * Unaccent a string
 *
 * An example string like ÀØėÿᾜὨζὅБю will be translated to AOeyIOzoBY.
 * More complete than :
 *
 *  strtr(
 *      (string)$str,
 *      "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ",
 *      "aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn"
 *  );
 *
 * @author http://www.evaisse.net/2008/php-translit-remove-accent-unaccent-21001
 * @param $str input string
 * @param $utf8 if null, function will detect input string encoding
 * @return string input string without accent
 */
function removeAccents($str, $utf8 = true) {
    $str = (string) $str;
    if (is_null($utf8)) {
        if (!function_exists('mb_detect_encoding')) {
            $utf8 = (strtolower(mb_detect_encoding($str)) == 'utf-8');
        } else {
            $length = strlen($str);
            $utf8 = true;

            for ($i = 0; $i < $length; $i++) {
                $c = ord($str[$i]);

                if ($c < 0x80) $n = 0; // 0bbbbbbb
                elseif (($c & 0xE0) == 0xC0) $n = 1; // 110bbbbb
                elseif (($c & 0xF0) == 0xE0) $n = 2; // 1110bbbb
                elseif (($c & 0xF8) == 0xF0) $n = 3; // 11110bbb
                elseif (($c & 0xFC) == 0xF8) $n = 4; // 111110bb
                elseif (($c & 0xFE) == 0xFC) $n = 5; // 1111110b
                else return false; // Does not match any model

                for ($j = 0; $j < $n; $j++) { // n bytes matching 10bbbbbb follow ?
                    if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80)) {
                        $utf8 = false;
                        break;
                    }
                }
            }
        }
    }

    if (!$utf8) {
        $str = utf8_encode($str);
    }

    $transliteration = array(
        'Ĳ' => 'I', 'Ö' => 'O', 'Œ' => 'O', 'Ü' => 'U', 'ä' => 'a', 'æ' => 'a',
        'ĳ' => 'i', 'ö' => 'o', 'œ' => 'o', 'ü' => 'u', 'ß' => 's', 'ſ' => 's',
        'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A',
        'Æ' => 'A', 'Ā' => 'A', 'Ą' => 'A', 'Ă' => 'A', 'Ç' => 'C', 'Ć' => 'C',
        'Č' => 'C', 'Ĉ' => 'C', 'Ċ' => 'C', 'Ď' => 'D', 'Đ' => 'D', 'È' => 'E',
        'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ē' => 'E', 'Ę' => 'E', 'Ě' => 'E',
        'Ĕ' => 'E', 'Ė' => 'E', 'Ĝ' => 'G', 'Ğ' => 'G', 'Ġ' => 'G', 'Ģ' => 'G',
        'Ĥ' => 'H', 'Ħ' => 'H', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
        'Ī' => 'I', 'Ĩ' => 'I', 'Ĭ' => 'I', 'Į' => 'I', 'İ' => 'I', 'Ĵ' => 'J',
        'Ķ' => 'K', 'Ľ' => 'K', 'Ĺ' => 'K', 'Ļ' => 'K', 'Ŀ' => 'K', 'Ł' => 'L',
        'Ñ' => 'N', 'Ń' => 'N', 'Ň' => 'N', 'Ņ' => 'N', 'Ŋ' => 'N', 'Ò' => 'O',
        'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ø' => 'O', 'Ō' => 'O', 'Ő' => 'O',
        'Ŏ' => 'O', 'Ŕ' => 'R', 'Ř' => 'R', 'Ŗ' => 'R', 'Ś' => 'S', 'Ş' => 'S',
        'Ŝ' => 'S', 'Ș' => 'S', 'Š' => 'S', 'Ť' => 'T', 'Ţ' => 'T', 'Ŧ' => 'T',
        'Ț' => 'T', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ū' => 'U', 'Ů' => 'U',
        'Ű' => 'U', 'Ŭ' => 'U', 'Ũ' => 'U', 'Ų' => 'U', 'Ŵ' => 'W', 'Ŷ' => 'Y',
        'Ÿ' => 'Y', 'Ý' => 'Y', 'Ź' => 'Z', 'Ż' => 'Z', 'Ž' => 'Z', 'à' => 'a',
        'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ā' => 'a', 'ą' => 'a', 'ă' => 'a',
        'å' => 'a', 'ç' => 'c', 'ć' => 'c', 'č' => 'c', 'ĉ' => 'c', 'ċ' => 'c',
        'ď' => 'd', 'đ' => 'd', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
        'ē' => 'e', 'ę' => 'e', 'ě' => 'e', 'ĕ' => 'e', 'ė' => 'e', 'ƒ' => 'f',
        'ĝ' => 'g', 'ğ' => 'g', 'ġ' => 'g', 'ģ' => 'g', 'ĥ' => 'h', 'ħ' => 'h',
        'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ī' => 'i', 'ĩ' => 'i',
        'ĭ' => 'i', 'į' => 'i', 'ı' => 'i', 'ĵ' => 'j', 'ķ' => 'k', 'ĸ' => 'k',
        'ł' => 'l', 'ľ' => 'l', 'ĺ' => 'l', 'ļ' => 'l', 'ŀ' => 'l', 'ñ' => 'n',
        'ń' => 'n', 'ň' => 'n', 'ņ' => 'n', 'ŉ' => 'n', 'ŋ' => 'n', 'ò' => 'o',
        'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ø' => 'o', 'ō' => 'o', 'ő' => 'o',
        'ŏ' => 'o', 'ŕ' => 'r', 'ř' => 'r', 'ŗ' => 'r', 'ś' => 's', 'š' => 's',
        'ť' => 't', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ū' => 'u', 'ů' => 'u',
        'ű' => 'u', 'ŭ' => 'u', 'ũ' => 'u', 'ų' => 'u', 'ŵ' => 'w', 'ÿ' => 'y',
        'ý' => 'y', 'ŷ' => 'y', 'ż' => 'z', 'ź' => 'z', 'ž' => 'z', 'Α' => 'A',
        'Ά' => 'A', 'Ἀ' => 'A', 'Ἁ' => 'A', 'Ἂ' => 'A', 'Ἃ' => 'A', 'Ἄ' => 'A',
        'Ἅ' => 'A', 'Ἆ' => 'A', 'Ἇ' => 'A', 'ᾈ' => 'A', 'ᾉ' => 'A', 'ᾊ' => 'A',
        'ᾋ' => 'A', 'ᾌ' => 'A', 'ᾍ' => 'A', 'ᾎ' => 'A', 'ᾏ' => 'A', 'Ᾰ' => 'A',
        'Ᾱ' => 'A', 'Ὰ' => 'A', 'ᾼ' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D',
        'Ε' => 'E', 'Έ' => 'E', 'Ἐ' => 'E', 'Ἑ' => 'E', 'Ἒ' => 'E', 'Ἓ' => 'E',
        'Ἔ' => 'E', 'Ἕ' => 'E', 'Ὲ' => 'E', 'Ζ' => 'Z', 'Η' => 'I', 'Ή' => 'I',
        'Ἠ' => 'I', 'Ἡ' => 'I', 'Ἢ' => 'I', 'Ἣ' => 'I', 'Ἤ' => 'I', 'Ἥ' => 'I',
        'Ἦ' => 'I', 'Ἧ' => 'I', 'ᾘ' => 'I', 'ᾙ' => 'I', 'ᾚ' => 'I', 'ᾛ' => 'I',
        'ᾜ' => 'I', 'ᾝ' => 'I', 'ᾞ' => 'I', 'ᾟ' => 'I', 'Ὴ' => 'I', 'ῌ' => 'I',
        'Θ' => 'T', 'Ι' => 'I', 'Ί' => 'I', 'Ϊ' => 'I', 'Ἰ' => 'I', 'Ἱ' => 'I',
        'Ἲ' => 'I', 'Ἳ' => 'I', 'Ἴ' => 'I', 'Ἵ' => 'I', 'Ἶ' => 'I', 'Ἷ' => 'I',
        'Ῐ' => 'I', 'Ῑ' => 'I', 'Ὶ' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M',
        'Ν' => 'N', 'Ξ' => 'K', 'Ο' => 'O', 'Ό' => 'O', 'Ὀ' => 'O', 'Ὁ' => 'O',
        'Ὂ' => 'O', 'Ὃ' => 'O', 'Ὄ' => 'O', 'Ὅ' => 'O', 'Ὸ' => 'O', 'Π' => 'P',
        'Ρ' => 'R', 'Ῥ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Ύ' => 'Y',
        'Ϋ' => 'Y', 'Ὑ' => 'Y', 'Ὓ' => 'Y', 'Ὕ' => 'Y', 'Ὗ' => 'Y', 'Ῠ' => 'Y',
        'Ῡ' => 'Y', 'Ὺ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'P', 'Ω' => 'O',
        'Ώ' => 'O', 'Ὠ' => 'O', 'Ὡ' => 'O', 'Ὢ' => 'O', 'Ὣ' => 'O', 'Ὤ' => 'O',
        'Ὥ' => 'O', 'Ὦ' => 'O', 'Ὧ' => 'O', 'ᾨ' => 'O', 'ᾩ' => 'O', 'ᾪ' => 'O',
        'ᾫ' => 'O', 'ᾬ' => 'O', 'ᾭ' => 'O', 'ᾮ' => 'O', 'ᾯ' => 'O', 'Ὼ' => 'O',
        'ῼ' => 'O', 'α' => 'a', 'ά' => 'a', 'ἀ' => 'a', 'ἁ' => 'a', 'ἂ' => 'a',
        'ἃ' => 'a', 'ἄ' => 'a', 'ἅ' => 'a', 'ἆ' => 'a', 'ἇ' => 'a', 'ᾀ' => 'a',
        'ᾁ' => 'a', 'ᾂ' => 'a', 'ᾃ' => 'a', 'ᾄ' => 'a', 'ᾅ' => 'a', 'ᾆ' => 'a',
        'ᾇ' => 'a', 'ὰ' => 'a', 'ᾰ' => 'a', 'ᾱ' => 'a', 'ᾲ' => 'a', 'ᾳ' => 'a',
        'ᾴ' => 'a', 'ᾶ' => 'a', 'ᾷ' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd',
        'ε' => 'e', 'έ' => 'e', 'ἐ' => 'e', 'ἑ' => 'e', 'ἒ' => 'e', 'ἓ' => 'e',
        'ἔ' => 'e', 'ἕ' => 'e', 'ὲ' => 'e', 'ζ' => 'z', 'η' => 'i', 'ή' => 'i',
        'ἠ' => 'i', 'ἡ' => 'i', 'ἢ' => 'i', 'ἣ' => 'i', 'ἤ' => 'i', 'ἥ' => 'i',
        'ἦ' => 'i', 'ἧ' => 'i', 'ᾐ' => 'i', 'ᾑ' => 'i', 'ᾒ' => 'i', 'ᾓ' => 'i',
        'ᾔ' => 'i', 'ᾕ' => 'i', 'ᾖ' => 'i', 'ᾗ' => 'i', 'ὴ' => 'i', 'ῂ' => 'i',
        'ῃ' => 'i', 'ῄ' => 'i', 'ῆ' => 'i', 'ῇ' => 'i', 'θ' => 't', 'ι' => 'i',
        'ί' => 'i', 'ϊ' => 'i', 'ΐ' => 'i', 'ἰ' => 'i', 'ἱ' => 'i', 'ἲ' => 'i',
        'ἳ' => 'i', 'ἴ' => 'i', 'ἵ' => 'i', 'ἶ' => 'i', 'ἷ' => 'i', 'ὶ' => 'i',
        'ῐ' => 'i', 'ῑ' => 'i', 'ῒ' => 'i', 'ῖ' => 'i', 'ῗ' => 'i', 'κ' => 'k',
        'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => 'k', 'ο' => 'o', 'ό' => 'o',
        'ὀ' => 'o', 'ὁ' => 'o', 'ὂ' => 'o', 'ὃ' => 'o', 'ὄ' => 'o', 'ὅ' => 'o',
        'ὸ' => 'o', 'π' => 'p', 'ρ' => 'r', 'ῤ' => 'r', 'ῥ' => 'r', 'σ' => 's',
        'ς' => 's', 'τ' => 't', 'υ' => 'y', 'ύ' => 'y', 'ϋ' => 'y', 'ΰ' => 'y',
        'ὐ' => 'y', 'ὑ' => 'y', 'ὒ' => 'y', 'ὓ' => 'y', 'ὔ' => 'y', 'ὕ' => 'y',
        'ὖ' => 'y', 'ὗ' => 'y', 'ὺ' => 'y', 'ῠ' => 'y', 'ῡ' => 'y', 'ῢ' => 'y',
        'ῦ' => 'y', 'ῧ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'p', 'ω' => 'o',
        'ώ' => 'o', 'ὠ' => 'o', 'ὡ' => 'o', 'ὢ' => 'o', 'ὣ' => 'o', 'ὤ' => 'o',
        'ὥ' => 'o', 'ὦ' => 'o', 'ὧ' => 'o', 'ᾠ' => 'o', 'ᾡ' => 'o', 'ᾢ' => 'o',
        'ᾣ' => 'o', 'ᾤ' => 'o', 'ᾥ' => 'o', 'ᾦ' => 'o', 'ᾧ' => 'o', 'ὼ' => 'o',
        'ῲ' => 'o', 'ῳ' => 'o', 'ῴ' => 'o', 'ῶ' => 'o', 'ῷ' => 'o', 'А' => 'A',
        'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'E',
        'Ж' => 'Z', 'З' => 'Z', 'И' => 'I', 'Й' => 'I', 'К' => 'K', 'Л' => 'L',
        'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S',
        'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'K', 'Ц' => 'T', 'Ч' => 'C',
        'Ш' => 'S', 'Щ' => 'S', 'Ы' => 'Y', 'Э' => 'E', 'Ю' => 'Y', 'Я' => 'Y',
        'а' => 'A', 'б' => 'B', 'в' => 'V', 'г' => 'G', 'д' => 'D', 'е' => 'E',
        'ё' => 'E', 'ж' => 'Z', 'з' => 'Z', 'и' => 'I', 'й' => 'I', 'к' => 'K',
        'л' => 'L', 'м' => 'M', 'н' => 'N', 'о' => 'O', 'п' => 'P', 'р' => 'R',
        'с' => 'S', 'т' => 'T', 'у' => 'U', 'ф' => 'F', 'х' => 'K', 'ц' => 'T',
        'ч' => 'C', 'ш' => 'S', 'щ' => 'S', 'ы' => 'Y', 'э' => 'E', 'ю' => 'Y',
        'я' => 'Y', 'ð' => 'd', 'Ð' => 'D', 'þ' => 't', 'Þ' => 'T', 'ა' => 'a',
        'ბ' => 'b', 'გ' => 'g', 'დ' => 'd', 'ე' => 'e', 'ვ' => 'v', 'ზ' => 'z',
        'თ' => 't', 'ი' => 'i', 'კ' => 'k', 'ლ' => 'l', 'მ' => 'm', 'ნ' => 'n',
        'ო' => 'o', 'პ' => 'p', 'ჟ' => 'z', 'რ' => 'r', 'ს' => 's', 'ტ' => 't',
        'უ' => 'u', 'ფ' => 'p', 'ქ' => 'k', 'ღ' => 'g', 'ყ' => 'q', 'შ' => 's',
        'ჩ' => 'c', 'ც' => 't', 'ძ' => 'd', 'წ' => 't', 'ჭ' => 'c', 'ხ' => 'k',
        'ჯ' => 'j', 'ჰ' => 'h',
    );

    return str_replace(array_keys($transliteration), array_values($transliteration), $str);
}

return array(
    'create json de bibliotecas' => function() use ($conn){
        return true;
        $bibliotecas = $conn->fetchAll("

SELECT
    s.*,
    vinc.value AS vinculo,
    mail.value AS email,
    tel.value AS telefone,
    en.value AS endereco,
    cep.value AS cep
FROM
    space s
    LEFT JOIN space_meta vinc ON vinc.key = 'vinculo'         AND vinc.object_id = s.id
    LEFT JOIN space_meta mail ON mail.key = 'emailPublico'    AND mail.object_id = s.id
    LEFT JOIN space_meta tel  ON tel.key  = 'telefonePublico' AND tel.object_id = s.id
    LEFT JOIN space_meta en   ON en.key   = 'endereco'        AND en.object_id = s.id
    LEFT JOIN space_meta cep  ON cep.key  = 'cep'             AND cep.object_id = s.id
WHERE
    s.status > 0

        ");

        $spaces = [];

        foreach($bibliotecas as $bib){
            $space = (object) $bib;
            $space->__metadata = new stdClass;

            preg_match('# *(?<rua>[^,]*), ?(?<num>.*|s/n|[0-9]+)? +- +Bairro: +(?<bairro>.*) +- +Cidade: +(?<cidade>.*) +- +UF: +(?<uf>.*)#', $space->endereco, $matches);

            $space->__metadata->telefonePublico = $space->telefone;
            $space->__metadata->emailPublico = $space->email;
            $space->__metadata->esfera_tipo = $space->vinculo;
            $space->__metadata->En_CEP = $space->cep;

            unset($space->id, $space->vinculo, $space->telefone, $space->email, $space->cep, $space->endereco);
            
            if($matches){
                $space->__metadata->En_Nome_Logradouro = $matches['rua'];
                $space->__metadata->En_Num = $matches['num'];
//                $space->__metadata->En_Complemento = $matches['bairro'];
                $space->__metadata->En_Bairro = $matches['bairro'];
                $space->__metadata->En_Municipio = $matches['cidade'];
                $space->__metadata->En_Estado = $matches['uf'];
                $space->__metadata->endereco = "{$matches['rua']}, {$matches['num']}, {$matches['bairro']}, {$space->__metadata->En_CEP}, {$matches['cidade']}, {$matches['uf']}";
            }

            $spaces[] = $space;
        }

        file_put_contents(__DIR__ . '/bibliotecas.json', json_encode($spaces));
        return false;
    },

    'importa bibliotecas' => function () use ($conn, $app){
        $repetidas = ['ATELIER DAS PALAVRAS	Avenida Santo Antônio - COMPLEMENTO: Nº 13 - CIDADE: Rio de Janeiro - ESTADO: RJ - CEP: 20941530',
'BIBLIOTECA CIDADE ALTA BICA	Rua Ponto Chique - COMPLEMENTO: Nº 117 - CIDADE: Rio de Janeiro - ESTADO: RJ - CEP: 21010315',
'BIBLIOTECA COMUNITÁRIA CANTINHO DOS SONHOS	Jeromenha - COMPLEMENTO: - CIDADE: Betim - ESTADO: MG - CEP: 32677790',
'BIBLIOTECA COMUNITÁRIA NOVOS HORIZONTES	Estrada Afonso Rodrigues Bittencourt - COMPLEMENTO: S/N - CIDADE: São José do Vale do Rio Preto - ESTADO: RJ - CEP: 25780000',
'BIBLIOTECA COMUNITÁRIA PAULO FREIRE	Paranapiacaba, 129 - COMPLEMENTO: FUNDOS - CIDADE: Nova Iguaçu - ESTADO: RJ - CEP: 26050720',
'BIBLIOTECA COMUNITÁRIA SALÃO DO ENCONTRO	João da Silva Santos - COMPLEMENTO: - CIDADE: Betim - ESTADO: MG - CEP: 32606042',
'BIBLIOTECA COMUNITÁRIA SOLANO TRINDADE	Rua Padre Bartolomeu Fagundes - COMPLEMENTO: Nº 19 Quadra 56 - CIDADE: Duque de Caxias - ESTADO: RJ - CEP: 25220445',
'BIBLIOTECA MINERVINA DOS SANTOS	AVENIDA ARYOSVALDO PEREIRA CINTRA, 181 - GRUTA DE LOURDES, MACEIO - AL - CEP: 57052580 ARYOSVALDO PEREIRA CINTRA 181 - COMPLEMENTO: - CIDADE: MACEIO - ESTADO: AL - CEP: 57052580',
'BIBLIOTECA RURAL CONCEIÇÃO KNUPP AMARAL	Sítio Corrégo de Santo Antonio - COMPLEMENTO: S/N - CIDADE: Bom Jardim - ESTADO: RJ - CEP: 28660000',
'BIBLIOTECA DE ARTES DE BRASILIA ETHEL DE OLIVEIRA DORNAS	SETOR DE POSTOS E MOTEIS BRASILIA-ANAPOLIS, 0 - SETOR DE MANSOES PARK WAY, NUCLEO BANDEIRANTE - DF - CEP: 71735000 DE POSTOS E MOTEIS BRASILIA-ANAPOLIS 0 - COMPLEMENTO: Espaço Lúcio Costa - CIDADE: NUCLEO BANDEIRANTE - ESTADO: DF - CEP: 70100000',
'BIBLIOTECA DE EXTENSÃO	General Labatut,nº27 Subsolo - COMPLEMENTO: - CIDADE: Salvador - ESTADO: BA - CEP: 40070100',
'BIBLIOTECA DE SAO PAULO	Cruzeiro do Sul - COMPLEMENTO: Parque da Juventude, Avenida Cruzeiro do Sul, 2630 - Santana, São Paulo - SP, Brazil - CIDADE: São Paulo - ESTADO: SP - CEP: 02030100',
'BIBLIOTECA DO CENTRO CULTURAL SAO BERNARDO	RUA EDNA QUINTEL, 320 - SAO BERNARDO, BELO HORIZONTE - MG - CEP: 31741313 EDNA QUINTEL 320 - COMPLEMENTO: - CIDADE: BELO HORIZONTE - ESTADO: MG - CEP: 31741313',
'BIBLIOTECA DO CENTRO CULTURAL VILA FÁTIMA	São Miguel Arcanjo - COMPLEMENTO: 215 - CIDADE: Belo Horizonte - ESTADO: MG - CEP: 30250440',
'BIBLIOTECA DO CENTRO CULTURAL VILA MARCOLA	RUA MANGABEIRA DA SERRA, 320 - SERRA, BELO HORIZONTE - MG - CEP: 30220265 MANGABEIRA DA SERRA 320 - COMPLEMENTO: - CIDADE: BELO HORIZONTE - ESTADO: MG - CEP: 30220265',
'BIBLIOTECA NACIONAL DE BRASÍLIA	Setor Cultural Sul, lote 2, Edifício da Biblioteca Nacional - COMPLEXO CULTURAL DA REPUBLICA - COMPLEMENTO: - CIDADE: BRASILIA - ESTADO: DF - CEP: 70070150',
'BIBLIOTECA PADRE AGOSTINHO CABALLERO MARTIN	RUA DA INSTALACAO, 70 - CENTRO, MANAUS - AM - CEP: 69010200 DA INSTALACAO 70 - COMPLEMENTO: - CIDADE: MANAUS - ESTADO: AM - CEP: 69010200',
'BIBLIOTECA PARQUE ESTADUAL	Av. Presidente Vargas - COMPLEMENTO: nº 1261 - CIDADE: Rio de Janeiro - ESTADO: RJ - CEP: 20071004',
'BIBLIOTECA PUBLICA CAMARA CASCUDO	RUA POTENGI, 535 - PETROPOLIS, NATAL - RN - CEP: 59020030 POTENGI 535 - COMPLEMENTO: - CIDADE: NATAL - ESTADO: RN - CEP: 59020030',
'BIBLIOTECA PÚBLICA ESTADUAL DR. ISAÍAS PAIM	Fernando Corrêa da Costa - COMPLEMENTO: 2º Andar | Centro - CIDADE: Campo Grande - ESTADO: MS - CEP: 79002820',
'BIBLIOTECA PÚBLICA ESTADUAL ESTEVÃO DE MENDONÇA	Rua Antônio Maria, 151 - COMPLEMENTO: - CIDADE: Cuiabá - ESTADO: MT - CEP: 78005440',
'BIBLIOTECA PÚBLICA ESTADUAL LUIZ DE BESSA	Praça da Liberdade - COMPLEMENTO: 21 - CIDADE: Belo Horizonte - ESTADO: MG - CEP: 30140010',
'BIBLIOTECA PÚBLICA MUNICIPAL CRISTINA MOREIRA ALVES	Praça Coronel José Antônio Tanure - COMPLEMENTO: sede - CIDADE: Araçuaí - ESTADO: MG - CEP: 39600000',
'BIBLIOTECA PÚBLICA MUNICIPAL DE GURINHÉM	Rua Flávio Ribeiro - COMPLEMENTO: 219 - CIDADE: GURINHEM - ESTADO: PB - CEP: 58356000',
'BIBLIOTECA PÚBLICA MUNICIPAL DE NILO PEÇANHA	Praça Cosme de Farias,17 - COMPLEMENTO: - CIDADE: Nilo Peçanha - ESTADO: BA - CEP: 45440000',
'BIBLIOTECA PÚBLICA MUNICIPAL DE TAQUARALTO	Quadra 02, Rua 04, Lote 01 - COMPLEMENTO: - CIDADE: PALMAS - ESTADO: TO - CEP: 77270000',
'BIBLIOTECA PÚBLICA MUNICIPAL DE VENÂNCIO AIRES	Rua Osvaldo Aranha - COMPLEMENTO: 515 - CIDADE: Venâncio Aires - ESTADO: RS - CEP: 95800000',
'BIBLIOTECA PÚBLICA MUNICIPAL DE ZABELE	Rua João Francisco Alves - COMPLEMENTO: s/n - CIDADE: ZABELE - ESTADO: PB - CEP: 58515000',
'BIBLIOTECA PÚBLICA MUNICIPAL DENISE TAVARES	LAURO VILAS BOAS - COMPLEMENTO: N° 67 - CIDADE: SALVADOR - ESTADO: BA - CEP: 40325710',
'BIBLIOTECA PÚBLICA MUNICIPAL EUTÍMIA MACIEL MOREIRA	Rua Dr. Inácio Dias, 2148 - centro - COMPLEMENTO: Largo do Theberge - CIDADE: Icó - ESTADO: CE - CEP: 63430000',
'BIBLIOTECA PÚBLICA MUNICIPAL FELINTO FLORENTINO DE AZEVEDO	Rua Benedito Marinho - COMPLEMENTO: 661 - CIDADE: NOVA FLORESTA - ESTADO: PB - CEP: 58178000',
'BIBLIOTECA PÚBLICA MUNICIPAL FERNANDES BASTOS	Marechal Deodorio, 85 - COMPLEMENTO: - CIDADE: Osório - ESTADO: RS - CEP: 95520000',
'BIBLIOTECA PÚBLICA MUNICIPAL FRANCISCO MATIAS DE SOUSA	Rua Beija Leite nº72 - COMPLEMENTO: 63185000 - CIDADE: Farias Brito - ESTADO: CE - CEP: 63185000',
'BIBLIOTECA PÚBLICA MUNICIPAL FREI MARCELO BIANCHI	Av. Getúlio Vargas - COMPLEMENTO: Praça Frei Euzébio de Alfredo Chaves - CIDADE: Maracajá - ESTADO: SC - CEP: 88915000',
'BIBLIOTECA PÚBLICA MUNICIPAL GERVÁCIO MACIEL DA CRUZ	Rua Pedro Fernandes da Silva - COMPLEMENTO: - CIDADE: Serrolândia - ESTADO: BA - CEP: 44710000',
'BIBLIOTECA PÚBLICA MUNICIPAL JANDYR CÉSAR SAMPAIO	do Rosário - COMPLEMENTO: 741 - CIDADE: Resende - ESTADO: RJ - CEP: 27511291',
'BIBLIOTECA PÚBLICA MUNICIPAL JOÃO XXIII	Rua Mozart Serpa - COMPLEMENTO: - CIDADE: Bom Jardim - ESTADO: RJ - CEP: 28660000',
'BIBLIOTECA PÚBLICA MUNICIPAL JOSÉ GAMA DE QUEIRÓZ	Casa - COMPLEMENTO: - CIDADE: Pacajus - ESTADO: CE - CEP: 62870000',
'BIBLIOTECA PUBLICA MUNICIPAL KELLY CRISTINA RAMOS	RUA PROFESSOR JOSE WLADIMIR NORONHA DE OLIVEIRA, 139 - CENTRO, ALAMBARI - SP - CEP: 18220000 PROFESSOR JOSE WLADIMIR NORONHA DE OLIVEIRA 139 - COMPLEMENTO: - CIDADE: ALAMBARI - ESTADO: SP - CEP: 18220000',
'BIBLIOTECA PÚBLICA MUNICIPAL LEONOR AGUIAR BATISTA	do Rosário - COMPLEMENTO: - CIDADE: Betim - ESTADO: MG - CEP: 32604160',
'BIBLIOTECA PUBLICA MUNICIPAL LUIZ MARTINS EVANGELISTA	Rua 03 de Maio - COMPLEMENTO: - CIDADE: Croatá - ESTADO: CE - CEP: 62390000',
'BIBLIOTECA PÚBLICA MUNICIPAL MACHADO DE ASSIS	da Bandeira - COMPLEMENTO: 66 - CIDADE: Novo Hamburgo - ESTADO: RS - CEP: 93510140',
'BIBLIOTECA PÚBLICA MUNICIPAL MARIA NORONHA CARVALHO	tiradentes - COMPLEMENTO: sem complementos - CIDADE: Guaraí - ESTADO: TO - CEP: 77700000',
'BIBLIOTECA PUBLICA MUNICIPAL MARIO QUINTANA	PRACA OSWALDO ARANHA, 14 - CENTRO, ALEGRETE - RS - CEP: 97541540 OSWALDO ARANHA 14 - COMPLEMENTO: - CIDADE: ALEGRETE - ESTADO: RS - CEP: 97541540',
'Biblioteca Pública Municipal Monteiro Lobato	Avenida Flores da Cunha, 2251',
'Biblioteca Pública Municipal Monteiro Lobato	Rua General  Fonseca, 936',
'BIBLIOTECA PÚBLICA MUNICIPAL NEREU RAMOS	Ruy Barbosa - COMPLEMENTO: - CIDADE: Rio do Sul - ESTADO: SC - CEP: 89165487',
'BIBLIOTECA PÚBLICA MUNICIPAL POETA MANOEL NICODEMOS ARAÚJO	Rua Major Coelho - COMPLEMENTO: - CIDADE: Acaraú - ESTADO: CE - CEP: 62580000',
'BIBLIOTECA PÚBLICA MUNICIPAL PROFESSOR ANTONIO SERAFIM FILHO	Prédio - COMPLEMENTO: - CIDADE: Madalena - ESTADO: CE - CEP: 63860000',
'BIBLIOTECA PÚBLICA MUNICIPAL PROFESSOR ARNO MOMBACH	Avenida Antonio Kirch, 470 - COMPLEMENTO: - CIDADE: São José do Sul - ESTADO: RS - CEP: 95748000',
'BIBLIOTECA PÚBLICA MUNICIPAL PROFESSOR BRUNO ENEI	Frederico Wagner - COMPLEMENTO: 100 - CIDADE: Ponta Grossa - ESTADO: PR - CEP: 84035700',
'BIBLIOTECA PUBLICA MUNICIPAL PROFESSOR FRANCISCO LIMA BOTELHO	RUA CAPITÃO MIRANDA ,222 - COMPLEMENTO: - CIDADE: São Benedito - ESTADO: CE - CEP: 62370000',
'BIBLIOTECA PÚBLICA MUNICIPAL PROFESSOR GUSTAVO ADOLFO KOETZ	Arthur Geis, 255 - COMPLEMENTO: - CIDADE: Igrejinha - ESTADO: RS - CEP: 95650000',
'BIBLIOTECA PÚBLICA MUNICIPAL PROFESSOR MELLO CANÇADO	Torquato de Almeida - COMPLEMENTO: 26 - CIDADE: Pará de Minas - ESTADO: MG - CEP: 35660041',
'BIBLIOTECA PÚBLICA MUNICIPAL PROFESSOR NICÁCIO	Rua São Vicente - COMPLEMENTO: - CIDADE: Bela Cruz - ESTADO: CE - CEP: 62570000',
'BIBLIOTECA PÚBLICA MUNICIPAL PROFESSOR PÉRICLES PRADE	7 de Setembro - COMPLEMENTO: 414 - CIDADE: Timbó - ESTADO: SC - CEP: 89120000',
'Biblioteca Pública Municipal Professor Raymundo Brito Passos Pinheiro	BENEDITO VALADERES - COMPLEMENTO: 686 - CIDADE: Florestal - ESTADO: MG - CEP: 35690000',
'BIBLIOTECA PUBLICA MUNICIPAL PROFESSOR VICENTE SAMPAIO	rua Valderi Ribeiro Campos - COMPLEMENTO: n° 15 - CIDADE: Palmácia - ESTADO: CE - CEP: 62780000',
'BIBLIOTECA PÚBLICA MUNICIPAL RUI BARBOSA	Rua Joaquim Alves Nogueira - COMPLEMENTO: Rua Joaquim Alves Nogueira - CIDADE: Guaramiranga - ESTADO: CE - CEP: 62766000',
'BIBLIOTECA PÚBLICA MUNICIPAL SCHARFFENBERG DE QUADROS	Oito de Janeiro - COMPLEMENTO: 120 - CIDADE: São José dos Pinhais - ESTADO: PR - CEP: 83005110',
'BIBLIOTECA PÚBLICA MUNICIPAL TIRADENTES	RUA PADRE FRANCISCO MARIA TALLES - COMPLEMENTO: - CIDADE: Casimiro de Abreu - ESTADO: RJ - CEP: 28860000',
'BIBLIOTECA PÚBLICA MUNICIPAL VIANNA MOOG	Osvaldo Aranha, 934 - COMPLEMENTO: - CIDADE: São Leopoldo - ESTADO: RS - CEP: 93010040',
'BIBLIOTECA PÚBLICA MUNICIPAL VIVALDI WENCESLAU MOREIRA	Arthur Bernardes, 50 - COMPLEMENTO: - CIDADE: Muriaé - ESTADO: MG - CEP: 36880000',
'BIBLIOTECA PÚBLICA MUNICIPAL WELTON MARQUES GONZAGA	Presidente Vargas - COMPLEMENTO: ESPAÇO CULTURAL GLÁUCIA LEAL - CIDADE: Paragominas - ESTADO: PA - CEP: 68625130',
'BIBLIOTECA PUBLICA MUNICIPAL WILLIS ROBERTO BANKS LEITE	Av. Expedicionário Aparício, s/n - COMPLEMENTO: predio - CIDADE: Juquiá - ESTADO: SP - CEP: 11800000'];

        function sanitize($str){
            $str = removeAccents($str);
            $str = mb_strtolower($str);

            $str = str_replace(['biblioteca', 'publica', 'municipal'], '', $str);

            return trim($str);
        }
        
        $_repetidas = $repetidas;
        
        $repetidas = array_map(function($e){ return sanitize($e); }, $repetidas);

        $spaces = json_decode(file_get_contents(__DIR__ . '/bibliotecas.json'));

        $c = 0;



        foreach($spaces as $space){
            $eh_repetida = false;

            $name = str_replace(' ', '.*', preg_quote(sanitize($space->name)));
            $logradouro = @sanitize($space->__metadata->En_Nome_Logradouro);
            $municipio = @sanitize($space->__metadata->En_Municipio);
            $cep = @sanitize($space->__metadata->En_CEP);

            foreach($repetidas as $i => $r){

                if(preg_match('#'. $name . '#', $r)){
                    if($logradouro && preg_match('#' . preg_quote($logradouro) . '#', $r)){
                        $c++;
                        unset($_repetidas[$i]);
                        
                        $eh_repetida = true;

                    }else if ($municipio && preg_match('#' . preg_quote($municipio) . '#', $r)){
                        $c++;
                        unset($_repetidas[$i]);

                        $eh_repetida = true;

                    }else if ($cep && preg_match('#' . $cep . '#', $r)){
                        $c++;
                        unset($_repetidas[$i]);

                        $eh_repetida = true;
                    } 
                }
            }
            if(!$eh_repetida){
                $id = $conn->fetchColumn("SELECT nextval('space_id_seq'::regclass)");

                echo "inserindo biblioteca \"$space->name\" com o id ($id)\n";

                $space->is_verified = $space->is_verified ? 'true' : 'false';
                $space->public = $space->public ? 'true' : 'false';
                $space->agent_id = $app->config['snbp.agentId'];
                $space->name = $conn->quote($space->name);

                $conn->executeQuery("
                    INSERT INTO space (
                         id, location,  _geo_location,  name,  status,  type,  agent_id,  is_verified,  public
                    ) VALUES (
                        $id, '$space->location', '$space->_geo_location', $space->name, $space->status, $space->type, $space->agent_id, {$space->is_verified}, {$space->public}
                    )
                ");

                if(@$space->__metadata->En_Nome_Logradouro){
                    $space->__metadata->endereco = "{$space->__metadata->En_Nome_Logradouro}, {$space->__metadata->En_Num}, {$space->__metadata->En_Bairro}, {$space->__metadata->En_CEP}, {$space->__metadata->En_Municipio}, {$space->__metadata->En_Estado}";
                }

                $space->__metadata->num_sniic = "ES-$id";

                foreach($space->__metadata as $key => $val){
                    $conn->executeQuery("
                        INSERT INTO space_meta (
                            object_id, key, value
                        ) VALUES (
                            '$id', '$key', :val
                        )", ['val' => $val]);
                }
            }
        }

        print_r($_repetidas);
    },

    'Migra bibliotecas para os Sistemas Estaduais' => function () use ($conn, $app) {
        $mapeamento = [
            "AC" => 200916, //Acre (AC) -  http://mapas.cultura.gov.br/espaco/200916/
            "AL" => 202314, //Alagoas (AL) -  já tem http://mapas.cultura.gov.br/agente/202314/
            "AP" => 12493,  //Amapá (AP) - http://bibliotecas.cultura.gov.br/agente/12493/
            "AM" => 12511,  //Amazonas (AM) - http://bibliotecas.cultura.gov.br/agente/12511/
            "BA" => 12514,  //Bahia (BA) - http://bibliotecas.cultura.gov.br/agente/12514/
            "CE" => 12515,  //Ceará (CE) - http://bibliotecas.cultura.gov.br/agente/12515/
            "DF" => 12520,  //Distrito Federal (DF) - http://bibliotecas.cultura.gov.br/agente/12520/
            "ES" => 101404, //Espírito Santo (ES) - já tem - http://mapas.cultura.gov.br/agente/101404/
            "GO" => 12522,  //Goiás (GO) - http://bibliotecas.cultura.gov.br/agente/12522/
            "MA" => 12537,  //Maranhão (MA)- http://bibliotecas.cultura.gov.br/agente/12537/
            "MT" => 12539,  //Mato Grosso (MT) - http://bibliotecas.cultura.gov.br/agente/12539/
            "MS" => 12540,  //Mato Grosso do Sul (MS) - http://bibliotecas.cultura.gov.br/agente/12540/
            "MG" => 12541,  //Minas Gerais (MG) - http://bibliotecas.cultura.gov.br/agente/12541/
            "PA" => 12542,  //Pará (PA) - http://bibliotecas.cultura.gov.br/agente/12542/
            "PB" => 12543,  //Paraíba (PB) - http://bibliotecas.cultura.gov.br/agente/12543/
            "PR" => 12544,  //Paraná (PR) - http://bibliotecas.cultura.gov.br/agente/12544/
            "PE" => 12547,  //Pernambuco (PE) - http://bibliotecas.cultura.gov.br/agente/12547/
            "PI" => 12552,  //Piauí (PI) - http://bibliotecas.cultura.gov.br/agente/12552/
            "RJ" => 202473, //Rio de Janeiro (RJ) - http://mapas.cultura.gov.br/agente/202473/
            "RN" => 101339, //Rio Grande do Norte (RN) - já tem -  http://mapas.cultura.gov.br/agente/101339/
            "RS" => 12557,  //Rio Grande do Sul (RS) - http://bibliotecas.cultura.gov.br/agente/12557/
            "RO" => 12556,  //Rondônia (RO) - http://bibliotecas.cultura.gov.br/agente/12556/
            "RR" => 12555,  //Roraima (RR) - http://bibliotecas.cultura.gov.br/agente/12555/
            "SC" => 12553,  //Santa Catarina (SC) - http://bibliotecas.cultura.gov.br/agente/12553/
            "SP" => 203776, //São Paulo (SP) - já tem - http://mapas.cultura.gov.br/agente/203776/
            "SE" => 101907, //Sergipe (SE) - já tem - http://mapas.cultura.gov.br/agente/101907/
            "TO" => 12551   //Tocantins (TO) - http://bibliotecas.cultura.gov.br/agente/12551/
        ];
        $source_agent_id = 1;

        $bibliotecas = $conn->fetchAll("
            SELECT
                s.id,
                s.name,
                estado.value AS estado
            FROM
                space s
                LEFT JOIN space_meta estado  ON estado.key  = 'En_Estado' AND estado.object_id = s.id
            WHERE
                s.status > 0
            AND s.agent_id = $source_agent_id
        ");

        $falhas = [];
        for ($i = 0; $i < count($bibliotecas); $i++) {
            $bib = $bibliotecas[$i];
            if (isset($bib['estado']) && $bib['estado'] != 'NULL') {
                $sql = "UPDATE space SET agent_id={$mapeamento[$bib['estado']]} WHERE space_id={$bib['id']}";
                echo "\n $i: $sql";
                $conn->executeQuery($sql);
            } else {
                array_push($falhas, $bib);
            }
        }

        echo "\n\n\n ----------------------------- \n\n Falhas \n";

        for ($i = 0; $i < count($falhas); $i++) {
            $falha = $falhas[$i];
            echo "\n $i: Falhado: UF \"{$falha['estado']}\", id: {$falha['id']}, nome: {$falha['name']}";
        }
    }
);