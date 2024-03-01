<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Calculate</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div class="container">
            <h2>Calculate Food Set</h2> 
            <form id="calculate-form" class="item-form">
                @csrf
                <div class="control-group space-between">
                    <label>Red Set</label>
                    <div class="control-box"><input type="number" class="control-input number-input" name="Red" value="0" min="0" /></div>
                </div>
                
                <div class="control-group space-between">
                    <label>Green Set</label>
                    <div class="control-box"><input type="number" class="control-input number-input" name="Green" value="0" min="0" /></div>
                </div>

                <div class="control-group space-between">
                    <label>Blue Set</label>
                    <div class="control-box"><input type="number" class="control-input number-input" name="Blue" value="0" min="0" /></div>
                </div>

                <div class="control-group space-between">
                    <label>Yellow Set</label>
                    <div class="control-box"><input type="number" class="control-input number-input" name="Yellow" value="0" min="0" /></div>
                </div>

                <div class="control-group space-between">
                    <label>Pink Set</label>
                    <div class="control-box"><input type="number" class="control-input number-input" name="Pink" value="0" min="0" /></div>
                </div>

                <div class="control-group space-between">
                    <label>Purple Set :</label>
                    <div class="control-box"><input type="number" class="control-input number-input" name="Purple" value="0" min="0" /></div>
                </div>

                <div class="control-group space-between">
                    <label>Orange Set</label>
                    <div class="control-box"><input type="number" class="control-input number-input" name="Orange" value="0" min="0" /></div>
                </div>

                <hr />

                <div class="member-option-container">
                    <label>Member?</label>
                    <div class="control-box"><input name="isMember" type="checkbox" value="1" /></div>
                </div>

                <hr />

                <div class="button-container">
                    <button type="submit" class="button">submit</button>
                </div>
            </form>

            <div id="resultContainer" class="result-container">
                <h4>Sub Total:</h4>
                <label id="resultValue"></label>
            </div>
        </div>
        <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"
      ></script>
      <script src="/js/calculate.js" type="text/javascript"></script>
    </body>
</html>
