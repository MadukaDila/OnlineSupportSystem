@component('mail::message')
# Ticket Created

Your ticket has been created with the following details:

**Reference Number:** {{ $ticket->reference_number }}
**Customer Name:** {{ $ticket->customer_name }}
**Problem Description:** {{ $ticket->problem_description }}
**Email:** {{ $ticket->email }}
**Phone Number:** {{ $ticket->phone_number }}

Thank you for using our support ticket system.

@endcomponent
