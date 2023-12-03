import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, useForm } from "@inertiajs/react";
import { PageProps } from "@/types";
import { BaseSyntheticEvent } from "react";
import PrimaryButton from "@/Components/PrimaryButton";
import TextField from "@/Components/Forms/TextField";
import Card from "@/Components/Card";
import PageContainer from "@/Components/PageContainer";

export interface UsersInviteProps extends PageProps {}

export default function UsersInvite({ auth }: UsersInviteProps) {
    const { post, reset, data, setData, errors, processing } = useForm({
        name: "",
        email: "",
    });

    const submit = (e: BaseSyntheticEvent) => {
        e.preventDefault();
        post(route("user_invites.store"), { onSuccess: () => reset() });
    };

    return (
        <AuthenticatedLayout user={auth.user}>
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
