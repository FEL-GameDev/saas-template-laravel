import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link } from "@inertiajs/react";
import { PageProps, User } from "@/types";

export interface UsersIndexProps extends PageProps {
    users: User[];
    can_invite: boolean;
    invited_users: any;
}

export default function UsersIndex({
    auth,
    users,
    can_invite,
    invited_users,
}: UsersIndexProps) {
    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Users" />

            <div className="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 text-right">
                {can_invite && (
                    <Link
                        href={route("user_invites.create")}
                        as="button"
                        className="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                    >
                        Invite Users
                    </Link>
                )}
            </div>

            <h2>Users</h2>

            <div className="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <ul className="list-disc">
                    {users.map((user) => (
                        <li key={user.id}>
                            {user.name} - {}
                        </li>
                    ))}
                </ul>
            </div>

            <h2>Invited Users</h2>

            <div className="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <ul className="list-disc">
                    {invited_users.map((user: any) => (
                        <li key={user.id}>
                            {user.name} - {user.email} - {user.invite_code}{" "}
                            <Link
                                as="button"
                                href={route("user_invites.destroy", user.id)}
                                method="delete"
                            >
                                Delete
                            </Link>
                        </li>
                    ))}
                </ul>
            </div>
        </AuthenticatedLayout>
    );
}
