**Note:** This extension was part of the TYPO3 Core until TYPO3 v10 and is 
maintained by the [Friends of TYPO3](https://github.com/FriendsOfTYPO3/rsaauth) 
since then.

# TYPO3 extension `rsaauth`

Contains a service to authenticate TYPO3 BE and FE users using private/public
key encryption of passwords.

This is a fallback if the instance is not accessible via HTTPS. However, this
extension has many drawbacks and is not a suitable solution over properly
encrypted client/server communication. All sites nowadays should be only
accessible via HTTPS and rsaauth is not needed.

|                  | URL                                                    |
|------------------|--------------------------------------------------------|
| **Repository:**  | https://github.com/TYPO3-CMS/rsaauth                   |
| **Read online:** | https://docs.typo3.org/c/typo3/cms-rsaauth/main/en-us/ |
| **Packagist:**   | https://packagist.org/packages/typo3/cms-rsaauth       |
