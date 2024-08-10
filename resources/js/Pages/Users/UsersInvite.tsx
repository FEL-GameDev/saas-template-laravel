import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, useForm } from "@inertiajs/react";
import { PageProps } from "@/types";
import { BaseSyntheticEvent } from "react";
import PrimaryButton from "@/Components/PrimaryButton";
import { TextField } from "@/Components/Forms/TextField";
import Card from "@/Components/Card";
import PageContainer from "@/Components/PageContainer";
import {Routes} from "@/types/routes";
import InputSelect from "@/Components/Forms/InputSelect";
import {Role} from "@/types/roles";

export interface UsersInviteProps extends PageProps {
    roles: Role[];
}

export default function UsersInvite({ auth, roles }: UsersInviteProps) {
    const { post, reset, data, setData, errors, processing } = useForm({
        name: "",
        email: "",
        role_id: roles[0].id
    });

    const submit = (e: BaseSyntheticEvent) => {
        e.preventDefault();
        post(route("user_invites.store"), { onSuccess: () => reset() });
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={{ name: "Invite Users", backButton: Routes.USERS }}
        >
            <Head title="Invite New Users" />

            <PageContainer>
                <Card
                    heading="Invite new user"
                    subheading="Invited users will receive an email with a link to set up their account."
                >
                    <form onSubmit={submit}>
                        <div className="mt-6 space-y-6 flex flex-col justify-center w-4/12">
                            <TextField
                                fullWidth
                                name="name"
                                value={data.name}
                                errors={errors.name}
                                label="Name"
                                onChange={(e: any) =>
                                    setData("name", e.target.value)
                                }
                            />

                            <TextField
                                fullWidth
                                name="email"
                                value={data.email}
                                errors={errors.email}
                                label="Email"
                                onChange={(e: any) =>
                                    setData("email", e.target.value)
                                }
                            />

                            <InputSelect
                                label="Role"
                                name="role_id"
                                options={roles}
                                selected={roles[0].id}
                                onChange={(e: any) =>
                                    setData("role_id", e.target.value)
                                }
                            />
                        </div>

                        <PrimaryButton className="mt-4" disabled={processing}>
                            Send Invite
                        </PrimaryButton>
                    </form>
                </Card>
            </PageContainer>
        </AuthenticatedLayout>
    );
}
