<?php
$exchangeRate = json_decode('{
    "currencies": {
        "TWD": {
        "TWD": 1,
        "JPY": 3.669,
        "USD": 0.03281
        },
        "JPY": {
        "TWD": 0.26956,
        "JPY": 1,
        "USD": 0.00885
        },
        "USD": {
        "TWD": 30.444,
        "JPY": 111.801,
        "USD": 1
        }
    }
}', true);

$info = [
    'source' => $_GET['source'],
    'target' => $_GET['target'],
    'amount' => floatval(str_replace(',', '', $_GET['amount']))
];


if (isset($exchangeRate['currencies'][$info['source']]) == false) {
    echo json_encode([
        'status' => 'error',
        'message' => 'source currency not found'
    ]);
    exit;
} else {
    if (isset($exchangeRate['currencies'][$info['target']]) == false) {
        echo json_encode([
            'status' => 'error',
            'message' => 'target currency not found'
        ]);
        exit;
    } else {
        $source = $exchangeRate['currencies'][$info['source']];
        $target = $exchangeRate['currencies'][$info['target']];
        $amount = number_format(round($info['amount'] * $source[$info['target']], 2), 2);
        echo json_encode([
            'status' => 'success',
            'amount' => $amount,
        ]);
        exit;
    }
}
