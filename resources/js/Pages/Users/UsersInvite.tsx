import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, useForm } from "@inertiajs/react";
import { PageProps } from "@/types";
import { BaseSyntheticEvent } from "react";
import TextInput from "@/Components/TextInput";
import InputError from "@/Components/InputError";
import PrimaryButton from "@/Components/PrimaryButton";
import InputLabel from "@/Components/InputLabel";

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

            <div className="container">
                <form onSubmit={submit}>
                    <InputLabel htmlFor="name">Name</InputLabel>
                    <TextInput
                        name="name"
                        value={data.name}
                        onChange={(e) => setData("name", e.target.value)}
                    />

                    <InputError message={errors.name} className="mt-2" />

                    <InputLabel htmlFor="email">Email</InputLabel>
                    <TextInput
                        type="email"
                        name="email"
                        value={data.email}
                        onChange={(e) => setData("email", e.target.value)}
                    />

                    <InputError message={errors.email} className="mt-2" />

                    <div>
                        <PrimaryButton className="mt-4" disabled={processing}>
                            Invite
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </AuthenticatedLayout>
    );
}
