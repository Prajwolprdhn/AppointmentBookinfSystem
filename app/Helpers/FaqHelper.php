<?php

namespace App\Helpers;

use App\Models\Faq;


class FaqHelper
{
    public function show()
    {
        $faqs_first = Faq::take(3)->get();
        $faqs_second = Faq::skip(3)->take(3)->get();
        return [
            'faqs_first' => $faqs_first,
            'faqs_second' => $faqs_second,
        ];
    }
}
