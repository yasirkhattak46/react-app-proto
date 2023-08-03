// GoogleTranslateComponent.js
import React, { useEffect } from 'react';

const GoogleTranslateComponent = () => {
    useEffect(() => {
        // The callback function googleTranslateElementInit() will be called by the Google Translate API script
        // when it's loaded, and it will create the Google Translate widget.
        // This function should be defined in the global scope.
        const googleTranslateElementInit = () => {
            new window.google.translate.TranslateElement(
                {
                    pageLanguage: 'en',
                    includedLanguages: 'az,bn,pt,fr,de,en,id,it,ja,ms,ur,fa,pa,ru,ar,es,ta,te,th,tr,vi',
                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                },
                'google_translate_element'
            );
        };

        // Load the Google Translate API script dynamically
        const script = document.createElement('script');
        script.src = 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
        script.async = true;
        document.body.appendChild(script);

        // Clean up the script tag when the component is unmounted
        return () => {
            document.body.removeChild(script);
        };
    }, []);

    return (
        <div id="google_translate_element">
            {/* The Google Translate widget will be created here */}
        </div>
    );
};

export default GoogleTranslateComponent;
