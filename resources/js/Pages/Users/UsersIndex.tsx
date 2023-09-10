import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link } from "@inertiajs/react";
import { PageProps, User } from "@/types";
import PageContainer from "@/Components/PageContainer";
import Card from "@/Components/Card";
import PrimaryButton from "@/Components/PrimaryButton";

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

            <PageContainer>
                <div className="mx-auto text-right">
                    {can_invite && (
                        <Link
                            href={route("user_invites.create")}
                            as="button"
                            className="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        >
                            Invite User
                        </Link>
                    )}
                </div>

                <Card heading="Users" className="max-w-xl">
                    <ul className="list-none">
                        {users.map((user) => (
                            <li key={user.id}>
                                {user.name} - {user.email}
                            </li>
                        ))}
                    </ul>
                </Card>

                <Card
                    className="max-w-xl"
                    heading="Invited Users"
                    subheading="These users have received an email to join your organization."
                >
                    {invited_users.length > 0 && (
                        <ul>
                            {invited_users.map((user: any) => (
                                <li key={user.id}>
                                    {user.name} - {user.email} -{" "}
                                    {user.invite_code}{" "}
                                    <Link
                                        as="button"
                                        href={route(
                                            "user_invites.destroy",
                                            user.id
                                        )}
                                        method="delete"
                                    >
                                        Delete
                                    </Link>
                                </li>
                            ))}
                        </ul>
                    )}
                </Card>
            </PageContainer>
        </AuthenticatedLayout>
    );
}
