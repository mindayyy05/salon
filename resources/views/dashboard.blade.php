<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Salon Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <!-- Dummy Content Section -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-700">Welcome to SalonEase Admin Dashboard!</h3>
                    <p class="mt-2 text-gray-600">We are thrilled to have you here. As an admin, you can manage the application content that customers view in the mobile app. Use the sections below to:</p>
                    <ul class="mt-2 list-disc list-inside text-gray-600">
                        <li>Create, view, and modify users</li>
                        <li>Create, view, and modify stylists offering services</li>
                        <li>Create, view, and modify categories of services</li>
                        <li>Create, view, and modify service offerings</li>
                        <li>Manage customer appointments</li>
                    </ul>
                    <p class="mt-2 text-gray-600">Explore the features to enhance the customer experience and ensure smooth operations!</p>
                </div>
                <!-- Services Section -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-700">Services Offered</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-4">
                        <!-- Service Card -->
                        <div class="bg-gray-200 p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                            <img src="images/haircut.jpg" alt="Haircut" class="w-full h-32 object-cover rounded-md mb-4">
                            <h4 class="mt-2 font-semibold text-lg text-gray-800">Haircut</h4>
                            <p class="text-gray-600">Different ranges of services under Haircut with different price rates</p>
                        </div>
                        <div class="bg-gray-200 p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                            <img src="images/facial.jpg" alt="Facial" class="w-full h-32 object-cover rounded-md mb-4">
                            <h4 class="mt-2 font-semibold text-lg text-gray-800">Facial</h4>
                            <p class="text-gray-600">Different ranges of services under Facial with different price rates</p>
                        </div>
                        <div class="bg-gray-200 p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                            <img src="images/manicure.jpg" alt="Manicure" class="w-full h-32 object-cover rounded-md mb-4">
                            <h4 class="mt-2 font-semibold text-lg text-gray-800">Manicure</h4>
                            <p class="text-gray-600">Different ranges of services under Manicure with different price rates</p>
                        </div>
                        <div class="bg-gray-200 p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                            <img src="images/pedicure1.webp" alt="Pedicure" class="w-full h-32 object-cover rounded-md mb-4">
                            <h4 class="mt-2 font-semibold text-lg text-gray-800">Pedicure</h4>
                            <p class="text-gray-600">Different ranges of services under Pedicure with different price rates</p>
                        </div>
                        <div class="bg-gray-200 p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                            <img src="images/massage.jpeg" alt="Massage" class="w-full h-32 object-cover rounded-md mb-4">
                            <h4 class="mt-2 font-semibold text-lg text-gray-800">Massage</h4>
                            <p class="text-gray-600">Different ranges of services under Massage with different price rates</p>
                        </div>
                        <div class="bg-gray-200 p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
                            <img src="images/makeup.jpeg" alt="Makeup" class="w-full h-32 object-cover rounded-md mb-4">
                            <h4 class="mt-2 font-semibold text-lg text-gray-800">Makeup</h4>
                            <p class="text-gray-600">Different ranges of services under Makeup with different price rates<</p>
                        </div>
                    </div>
                </div>
                <!-- Additional Information Section -->
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-gray-700">Contact Us</h3>
                    <p class="mt-2 text-gray-600">If you have any questions or need further assistance, please feel free to reach out!</p>
                    <p class="mt-1 text-gray-700">Email: support@salonease.com</p>
                    <p class="mt-1 text-gray-700">Phone: (+94) 776447890</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
