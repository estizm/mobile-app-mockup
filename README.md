Mobile app mockup data 

## Routes ## 

Route::post('/register', [DevicesController::class, 'register']);
Route::post('/purchase', [PurchaseController::class,  'purchase']);
Route::post('/subscription', [PurchaseController::class, 'subscription']);

## End routes ##

## Register Example Request ## 

{
    "uid" :"123131-31231SDADAd1231",
    "appId": "1231",
    "language": "tr",
    "os": "IOS",
    "client-token": ""
}

## Purchase Example Request ##

{
    "client-token" : "4332146f-419a-4e99-9fe8-26b437fb116f",
    "receipt": "1321313dsadadada32132"
}


## Subscription Example Request ## 

{
    "client-token": "4332146f-419a-4e99-9fe8-26b437fb116f"
}
