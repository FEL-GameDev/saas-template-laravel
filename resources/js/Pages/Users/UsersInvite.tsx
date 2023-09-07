import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, useForm } from "@inertiajs/react";
import { PageProps } from "@/types";
import { BaseSyntheticEvent } from "react";
import TextInput from "@/Components/Forms/TextInput";
import InputError from "@/Components/Forms/InputError";
import PrimaryButton from "@/Components/PrimaryButton";
import InputLabel from "@/Components/Forms/InputLabel";
import TextField from "@/Components/Forms/TextField";

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

            <div className="sm:container mx-auto flex justify-center p-8">
                <form
                    onSubmit={submit}
                    className="flex flex-col justify-center gap-4 w-4/12"
                >
                    <TextField
                        fullWidth
                        name="name"
                        value={data.name}
                        errors={errors.name}
                        label="Name"
                        onChange={(e: any) => setData("name", e.target.value)}
                    />

                    <TextField
                        fullWidth
                        name="email"
                        value={data.email}
                        errors={errors.email}
                        label="Email"
                        onChange={(e: any) => setData("email", e.target.value)}
                    />

                    <PrimaryButton className="mt-4" disabled={processing}>
                        Send Invite
                    </PrimaryButton>
                </form>
            </div>
        </AuthenticatedLayout>
    );
}
