# adoptify

## Specification:
1. User can create an account as either an adopter or a shelter.
2. Shelter user can add pets database for adoption.
3. Adopter user can browse pets database for adoption.
4. Adopter can submit application for pet in database.
5. Shelter can view and approve or reject application for pet in database.

## Database Design:
### Users Table:
+ UserID: INT, Auto-increment, Primary Key
+ Username: VARCHAR(255), Unique
+ Password: VARCHAR(255) (hashed version?)
+ UserType: ENUM('adopter', 'shelter')
+ CreatedAt: DATETIME
### Pets Table:
+ PetID: INT, Auto-increment, Primary Key
+ ShelterID: INT, Foreign Key referencing UserID in Users table (ensure UserType is shelter)
+ Name: VARCHAR(255)
+ Age: INT
+ Type: VARCHAR(100) (dog, cat, etc.)
+ Breed: VARCHAR(255)
+ Description: TEXT (optional additional information about pet)
+ Status: ENUM('available', 'adopted')
+ CreatedAt: DATETIME
### Applications Table:
+ ApplicationID: INT, Auto-increment, Primary Key
+ PetID: INT, Foreign Key referencing PetID in Pets table
+ AdopterID: INT, Foreign Key referencing UserID in Users table (ensure UserType is adopter)
+ Status: ENUM('pending', 'approved', 'rejected')
+ CreatedAt: DATETIME
+ UpdatedAt: DATETIME
