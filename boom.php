<!DOCTYPE html>
<html>

<body>
    <input onkeydown="phoneNumberFormatter()" id="phone-number" />

    <script>
        function formatPhoneNumber(value) {
            if (!value) return value;
            const phoneNumber = value.replace(/[^\d]/g, "");
            const phoneNumberLength = phoneNumber.length;
            if (phoneNumberLength < 4) return phoneNumber;
            if (phoneNumberLength < 7) {
                return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3)}`;
            }
            return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(
          3,
          6
        )}-${phoneNumber.slice(6, 9)}`;
        }

        function phoneNumberFormatter() {
            const inputField = document.getElementById("phone-number");
            const formattedInputValue = formattPhoneNumber(inputField.value);
            inputField.value = formattedInputValue;
        }
    </script>
    <script>
        if (string)(phone).length === 13; {
            phone = string(phone).slice(1);

        }
        if (string)(phone).length === 10; {
            phone = "254" + string(phone).slice(1);
        }
        elseif(string)(phone); {
            phone = phone
        }
    </script>
</body>

</html>