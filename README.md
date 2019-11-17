# adressbook
The library - adressbook 

For work with library need to create an object: 
$obj = NEW AdressBook();

There are 3 Methods with some set of parameters in this library:
1) getData - for information about users and user groups:

    - $obj->getData('Users') - getting the list of users;
    - $obj->getData('User', 1) - getting the user with user_id = 1
    - $obj->getData('Groups') - getting the list of groups;
    - $obj->getData('Groups', 1) - getting groups for user with user_id = 1;
    - $obj->getData('Addresses', 1) - getting addresses for user with user_id = 1;
    - $obj->getData('Phones', 1) - getting phones for user with user_id = 1;
    - $obj->getData('Emails', 1) - getting emails for user with user_id = 1;

2) addData - methods for adding information:
    
    - $obj->addData('User', $fields) - add user to adressbook. Now the method expects an array $fields of this kind:
            
            $fields = [
                "name" => "Piter",
                "surname" => "Parker",
                "emails" => ["parkerspi@gmail.com"],
                "groups" => [
                    1 => "Relatives"
                ],
                "phones" => ["+380501111111"],
                "addresses" => ["Alchi str. 8 fl.22"]
            ]; 
    
    - $obj->getData('Groups') - add group to adressbook. Just transfer the name of the group.

3) searchData - search methods for a user or group by specific parameters:

    - $obj->searchData('UsersByGroup', 4) - search user by group with group_id = 4;
    - $obj->searchData("UserByEmail", "nikita") - search user by email or part of email. "nikita" - the part of email nikita@gmail.com; 
    - $obj->searchData("UserByName", "Toliy Wagner") - search user by name or surname;
    - $obj->searchData('GroupsByUser', 1) - search groups for user with user_id = 1;

If you used the wrong first parameter in the method, 
you will see this message:
{"error":"This method is missing"}

Issues in this release:
- it is necessary to validate the input data as the second parameter in the methods addData;
- will probably need to accept json instead of arrays or create a set of forms for the front;
- need to decide where to store data. It can be a database or an API call. Now it library used the array for test. Class DataPacker will require significant changes.