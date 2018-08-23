## Laravel microservice file structure based on generic 'Client' example

This gives a file structure and implemenation template to Laravel API microservice/bundles

## Structure

This is just a proposed design, some of the elements may not be relevant for specific case.

### [/Clients/ApiDocs](/Clients/ApiDocs)

Api definition

### [/Clients/Contracts](/Clients/Contracts)

interfaces for all classes

### [/Clients/Models](/Clients/Models)

bundle models implementation

### [/Clients/Repositories](/Clients/Repositories)

repositories implementation

### [/Clients/Routes](/Clients/Routes)

routes definition

### [/Clients/Tests](/Clients/Tests)

unit/functional tests

### [/Clients/Controllers](/Clients/Controllers)

request controllers

### [/Clients/Database](/Clients/Database)

factories & migrations

### [/Clients/Providers](/Clients/Providers)

service providers - linking interfaces with implementation

### [/Clients/Requests](/Clients/Requests)

validators for requests

### [/Clients/Services](/Clients/Services)

additional services

### [/Clients/Transformers](/Clients/Transformers)

output transformers - responsible for formatting API output
