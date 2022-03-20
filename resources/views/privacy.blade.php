@extends('master') @section('title')
{{ __("Privacy Policy") }}
@endsection @section('content')
<div class="priv-container">
    <h1>{{ __("Privacy Policy") }}</h1>
    <p>
        {{
            __(
                "Your privacy is important to us. It is SendNote's policy to respect your privacy and comply with all applicable laws and regulations regarding any personal information we may collect about you, including on this site and other sites we own and operate."
            )
        }}
    </p>
    <p>
        {{
            __(
                "This policy is effective as of 23 December 2021 and was last updated on 19 March 2022."
            )
        }}
    </p>
    <h2>{{ __("Information We Collect") }}</h2>
    <p>
        {{ __("For the operation of the site, we only store:") }}
    </p>
    <ul>
        <li>
            {{ __("lorem ipsum dolor sit amet") }}
        </li>
        <li>
            {{ __("lorem ipsum dolor sit amet") }}
        </li>
        <li>
            {{ __("lorem ipsum dolor sit amet") }}
        </li>
        <li>
            {{ __("lorem ipsum dolor sit amet") }}
        </li>
        <li>
            {{ __("lorem ipsum dolor sit amet") }}
        </li>
    </ul>
    <p>
        {{
            __(
                "This information by itself does not identify an individual, nor does the combination of this information with other data identify individual persons."
            )
        }}
    </p>
    <h3>{{ __("How long do we keep the information you give us") }}</h3>
    <p>
        {{
            __(
                "We keep the data you provide to us for as long as it is used by you on our service."
            )
        }}
    </p>
    <p>
        {{
            __(
                "Data is deleted 30 days after the last use of your shortened link."
            )
        }}
    </p>
    <h2>{{ __("Disclosure of Information to Third Parties") }}</h2>
    <p>{{ __("We may disclose information to:") }}</p>
    <ul>
        <li>
            {{
                __(
                    "third party service providers for the purpose of enabling them to provide their services, for example, IT service providers, data storage, hosting and server providers"
                )
            }}
        </li>
        <li>{{ __("our employees, contractors, and/or related entities") }}</li>
        <li>
            {{
                __(
                    "courts, tribunals, regulatory authorities, and law enforcement officers, as required by law, in connection with any actual or prospective legal proceedings, or in order to establish, exercise, or defend our legal rights"
                )
            }}
        </li>
    </ul>
    <h2>{{ __("Your Rights and Controlling Your Personal Information") }}</h2>
    <p>
        {{
            __(
                "As we do not store any information by which you can be identified, it is not possible for us to remove a shortened link at your request, as it cannot be confirmed that it was created by you."
            )
        }}
    </p>
    <p>
        {{
            __(
                "An exception is when a reported link leads to illegal content prohibited by law. You can report any such links using the contact information at the bottom of the page."
            )
        }}
    </p>
    <p>
        {{
            __(
                "If you believe that we have breached a relevant data protection law and wish to make a complaint, please contact us using the details below and provide us with full details of the alleged breach. We will promptly investigate your complaint and respond to you, setting out the outcome of our investigation and the steps we will take to deal with your complaint. You also have the right to contact a regulatory body or data protection authority in relation to your complaint."
            )
        }}
    </p>
    <h2>{{ __("Limits of Our Policy") }}</h2>
    <p>
        {{
            __(
                "Our website may link to external sites that are not operated by us. Please be aware that we have no control over the content and policies of those sites, and cannot accept responsibility or liability for their respective privacy practices."
            )
        }}
    </p>
    <h2>{{ __("Changes to This Policy") }}</h2>
    <p>
        {{
            __(
                "At our discretion, we may change our privacy policy to reflect updates to our business processes, current acceptable practices, or legislative or regulatory changes. If we decide to change this privacy policy, we will post the changes here at the same link by which you are accessing this privacy policy."
            )
        }}
    </p>
    <h2>{{ __("Contact Us") }}</h2>
    <p>
        {{
            __(
                "For any questions or concerns regarding your privacy, you may contact us using the following details:"
            )
        }}
    </p>
    <p>Maciej Gawrysiak</p>
    <p>gawrysiakmaciej@duck.com</p>
</div>
@endsection
